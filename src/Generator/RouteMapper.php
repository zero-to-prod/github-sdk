<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Generator;

/**
 * Turns the document's `paths` into the `ApiRoute` enum's shape: one case per
 * path, one `#[AdminApi]` per operation on it.
 *
 * Operations are visited in a fixed verb order rather than document order, so
 * the run is reproducible and so name collisions resolve the same way every
 * time. That matters for `PUT` and `PATCH`, which the naming convention maps to
 * the same `update<Resource>` verb: `PUT` is visited first and keeps `update`,
 * and a `PATCH` on the same path falls back to `patch<Resource>` — see
 * {@see Naming::methodName()}.
 *
 * @internal
 */
final class RouteMapper
{
    /**
     * Verbs mapped to API methods, in visit order. `HEAD`, `OPTIONS` and
     * `TRACE` are absent on purpose: `Internal\HttpMethod` has no case for
     * them, so they are counted as skips instead.
     *
     * @var list<string>
     */
    public const VERBS = ['get', 'post', 'put', 'patch', 'delete'];

    /** Every verb OpenAPI allows on a path item, for telling verbs from metadata. */
    public const ALL_VERBS = ['get', 'put', 'post', 'delete', 'options', 'head', 'patch', 'trace'];

    private const JSON = 'application/json';

    /** @var list<Skip> */
    private array $skips = [];

    public function __construct(
        private readonly Document $document,
        private readonly Naming $naming,
        private readonly SchemaMapper $schemas,
    ) {}

    /**
     * Build the plan. Webhooks are never routes — they are inbound payloads,
     * not callable endpoints — so `$includeWebhooks` only decides whether their
     * payload schemas get models emitted.
     */
    public function map(bool $includeWebhooks = false): RoutePlan
    {
        $cases = [];

        foreach ($this->document->paths() as $path => $node) {
            $cases = [...$cases, ...$this->mapPath((string) $path, Json::map($node))];
        }

        $this->mapWebhooks($includeWebhooks);

        return new RoutePlan($cases);
    }

    /** @return list<Skip> */
    public function skips(): array
    {
        return $this->skips;
    }

    /**
     * The route case for one path — a list of zero or one, so a path that maps
     * to nothing needs no null handling upstream.
     *
     * @param  array<string, mixed> $node
     * @return list<RouteCase>
     */
    private function mapPath(string $path, array $node): array
    {
        $item = $this->document->resolve($node);
        $shared = Json::listOf($item['parameters'] ?? null);
        $operations = [];

        foreach (self::ALL_VERBS as $verb) {
            if (!array_key_exists($verb, $item)) {
                continue;
            }

            if (!in_array($verb, self::VERBS, true)) {
                $this->skips[] = new Skip(
                    Skip::OPERATION,
                    strtoupper($verb) . " $path",
                    'the SDK transport has no HttpMethod case for this verb',
                );
            }
        }

        foreach (self::VERBS as $verb) {
            if (!array_key_exists($verb, $item)) {
                continue;
            }

            $operations[] = $this->mapOperation($verb, $path, Json::map($item[$verb]), $shared);
        }

        if ($operations === []) {
            $this->skips[] = new Skip(Skip::PATH, $path, 'no supported operations — no route case emitted');

            return [];
        }

        return [new RouteCase(
            $this->naming->routeCaseName($path),
            $path,
            $operations,
            $this->summary($item),
        )];
    }

    /**
     * A description for the case docblock. Path items rarely carry one, so this
     * falls back to the first operation that does — which is where real specs
     * put it.
     *
     * @param array<string, mixed> $item
     */
    private function summary(array $item): ?string
    {
        $summary = Json::str($item['summary'] ?? null) ?? Json::str($item['description'] ?? null);

        if ($summary !== null) {
            return $summary;
        }

        foreach (self::VERBS as $verb) {
            $operation = Json::map($item[$verb] ?? null);
            $summary = Json::str($operation['summary'] ?? null) ?? Json::str($operation['description'] ?? null);

            if ($summary !== null) {
                return $summary;
            }
        }

        return null;
    }

    /**
     * @param array<string, mixed> $operation
     * @param list<mixed>          $shared    Path-level `parameters`.
     */
    private function mapOperation(string $verb, string $path, array $operation, array $shared): RouteOperation
    {
        $method = $this->naming->methodName($verb, $path);
        $subject = strtoupper($verb) . " $path";
        $body = $this->responseBody($operation, $method, $subject);

        return new RouteOperation(
            strtoupper($verb),
            $method,
            Naming::pathParameters($path),
            $this->queryParameters([...$shared, ...Json::listOf($operation['parameters'] ?? null)], $subject),
            $this->requestClass($operation, $method, $subject),
            $body->class,
            $body->listOf,
            Json::isTrue($operation['deprecated'] ?? null),
        );
    }

    /**
     * Query parameter names in declaration order, path-level first, deduped.
     * Names are passed through verbatim — they are wire keys, not identifiers.
     *
     * @param  list<mixed> $parameters
     * @return list<string>
     */
    private function queryParameters(array $parameters, string $subject): array
    {
        /** @var array<string, true> $names */
        $names = [];

        foreach ($parameters as $parameter) {
            $resolved = $this->document->resolve(Json::map($parameter));
            $name = Json::str($resolved['name'] ?? null);

            if ($name === null) {
                $this->skips[] = new Skip(Skip::OPERATION, $subject, 'a parameter has no `name` — ignored');
                continue;
            }

            if (Json::str($resolved['in'] ?? null) === 'query') {
                $names[$name] = true;
            }
        }

        return array_keys($names);
    }

    /**
     * The request body model. Inline bodies dominate real specs (302 of 342 in
     * the GitHub document), so they are promoted to `<MethodName>Request`, which
     * is unique because the method name is.
     *
     * @param array<string, mixed> $operation
     */
    private function requestClass(array $operation, string $method, string $subject): ?string
    {
        $body = $this->document->resolve(Json::map($operation['requestBody'] ?? null));

        if ($body === []) {
            return null;
        }

        $schema = $this->jsonSchema($body, "$subject request", 'request body');

        return $schema === null
            ? null
            : $this->schemas->bodyClass($schema, Naming::pascal($method) . 'Request', "$subject request");
    }

    /**
     * The body of the first 2xx response with a JSON one: one object
     * (`response:`), or the element class of a bare JSON array (`listOf:`).
     * `204` and other bodiless successes yield neither, which the attribute
     * renders as no response argument at all.
     *
     * @param array<string, mixed> $operation
     */
    private function responseBody(array $operation, string $method, string $subject): BodySpec
    {
        $responses = Json::map($operation['responses'] ?? null);
        $codes = [];

        foreach (array_keys($responses) as $code) {
            // Response codes are numeric, so PHP has already turned them into
            // integer array keys; see Json::map().
            $code = (string) $code;

            if (preg_match('/^2\d\d$/', $code) === 1) {
                $codes[] = $code;
            }
        }

        sort($codes);

        foreach ($codes as $code) {
            $response = $this->document->resolve(Json::map($responses[$code]));
            $schema = $this->jsonSchema($response, "$subject $code response", "$code response");

            if ($schema !== null) {
                return $this->schemas->responseBody($schema, Naming::pascal($method) . 'Response', "$subject $code response");
            }

            return new BodySpec();
        }

        $this->skips[] = new Skip(Skip::BODY, $subject, 'no 2xx response declared — no response model');

        return new BodySpec();
    }

    /**
     * The `application/json` schema of a body, or null with a counted skip when
     * the body is empty or offers no JSON representation.
     *
     * @param  array<string, mixed>      $body
     * @return array<string, mixed>|null
     */
    private function jsonSchema(array $body, string $subject, string $what): ?array
    {
        $content = Json::map($body['content'] ?? null);

        if ($content === []) {
            return null;
        }

        if (!array_key_exists(self::JSON, $content)) {
            $this->skips[] = new Skip(
                Skip::BODY,
                $subject,
                "$what offers only " . implode(', ', array_keys($content)) . ' — the SDK speaks JSON only',
            );

            return null;
        }

        $schema = Json::map(Json::map($content[self::JSON])['schema'] ?? null);

        return $schema === [] ? null : $schema;
    }

    /**
     * Webhook payloads. Their schemas are useful models, but a webhook is not a
     * callable endpoint, so none of them becomes a route case.
     */
    private function mapWebhooks(bool $include): void
    {
        $webhooks = $this->document->webhooks();

        if ($webhooks === []) {
            return;
        }

        if (!$include) {
            $this->skips[] = new Skip(
                Skip::WEBHOOK,
                count($webhooks) . ' webhook definition(s)',
                'webhooks are off by default — pass --webhooks to emit their payload models',
            );

            return;
        }

        foreach ($webhooks as $event => $node) {
            $event = (string) $event;
            $item = $this->document->resolve(Json::map($node));

            foreach (self::VERBS as $verb) {
                if (!array_key_exists($verb, $item)) {
                    continue;
                }

                $operation = Json::map($item[$verb]);
                $body = $this->document->resolve(Json::map($operation['requestBody'] ?? null));
                $schema = $this->jsonSchema($body, "webhook $event", 'payload');

                if ($schema !== null) {
                    $this->schemas->bodyClass($schema, Naming::pascal($event) . 'Payload', "webhook $event");
                }
            }

            $this->skips[] = new Skip(
                Skip::WEBHOOK,
                $event,
                'payload model emitted, but a webhook is inbound — no route case',
            );
        }
    }
}
