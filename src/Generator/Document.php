<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Generator;

/**
 * An OpenAPI 3.0/3.1 document held in memory, plus local `$ref` resolution.
 *
 * JSON only. YAML is rejected with an actionable message rather than parsed
 * half-heartedly — see {@see self::parse()}.
 *
 * Only same-document pointers (`#/...`) resolve; an external or remote `$ref`
 * is an error rather than a silent `mixed`, because dropping one would change
 * a property's type without anybody noticing.
 *
 * @internal
 */
final class Document
{
    /**
     * Longest `$ref` -> `$ref` chain followed before giving up. Cycles are
     * caught by identity first; this is the backstop for a pathologically deep
     * but acyclic chain.
     */
    public const MAX_REF_DEPTH = 64;

    /** @param array<string, mixed> $data */
    private function __construct(private readonly array $data) {}

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self($data);
    }

    /**
     * Load from a filesystem path or an `http(s)` URL.
     *
     * `$reader` overrides the read for tests; it receives the source string and
     * returns the document body (or `false` to signal failure).
     *
     * @param (callable(string): (string|false))|null $reader
     */
    public static function load(string $source, ?callable $reader = null): self
    {
        $raw = $reader !== null ? $reader($source) : @file_get_contents($source);

        if (!is_string($raw)) {
            throw new GeneratorException("Cannot read OpenAPI document: $source");
        }

        return self::parse($raw, $source);
    }

    /**
     * Decode a document body. `$label` names the source in error messages.
     */
    public static function parse(string $raw, string $label): self
    {
        $head = ltrim($raw);

        if ($head === '') {
            throw new GeneratorException("OpenAPI document is empty: $label");
        }

        if ($head[0] !== '{') {
            throw new GeneratorException(
                "$label is not a JSON OpenAPI document (it looks like YAML)."
                . ' The generator reads JSON only — convert it first, e.g.'
                . ' `npx -y js-yaml spec.yaml > spec.json`.',
            );
        }

        $data = json_decode($raw, true);

        if (!is_array($data)) {
            throw new GeneratorException("Malformed JSON in $label: " . json_last_error_msg());
        }

        /** @var array<string, mixed> $data */
        return new self($data);
    }

    /** The `openapi` version string, or `0.0.0` when absent. */
    public function version(): string
    {
        return Json::str($this->data['openapi'] ?? null) ?? '0.0.0';
    }

    /** @return array<string, mixed> */
    public function schemas(): array
    {
        return Json::map(Json::map($this->data['components'] ?? null)['schemas'] ?? null);
    }

    /** @return array<string, mixed> */
    public function paths(): array
    {
        return Json::map($this->data['paths'] ?? null);
    }

    /**
     * Webhook definitions under either the 3.1 `webhooks` key or the 3.0
     * `x-webhooks` extension GitHub uses.
     *
     * @return array<string, mixed>
     */
    public function webhooks(): array
    {
        $webhooks = Json::map($this->data['webhooks'] ?? null);

        return $webhooks !== [] ? $webhooks : Json::map($this->data['x-webhooks'] ?? null);
    }

    public function hasSchema(string $name): bool
    {
        return array_key_exists($name, $this->schemas());
    }

    /**
     * Follow a chain of `$ref`s until a concrete node is reached. A node with
     * no `$ref` is returned untouched, so this is safe to call on anything.
     *
     * @param  array<string, mixed>  $node
     * @return array<string, mixed>
     */
    public function resolve(array $node, int $maxDepth = self::MAX_REF_DEPTH): array
    {
        /** @var array<string, true> $seen */
        $seen = [];
        $depth = 0;

        while (($ref = Json::str($node['$ref'] ?? null)) !== null) {
            if (isset($seen[$ref])) {
                throw new GeneratorException(
                    'Circular $ref chain: ' . implode(' -> ', array_keys($seen)) . " -> $ref",
                );
            }

            if (++$depth > $maxDepth) {
                throw new GeneratorException("\$ref chain deeper than $maxDepth levels at $ref");
            }

            $seen[$ref] = true;
            $node = $this->pointer($ref);
        }

        return $node;
    }

    /**
     * Dereference one JSON pointer against this document.
     *
     * @return array<string, mixed>
     */
    public function pointer(string $ref): array
    {
        if (!str_starts_with($ref, '#/')) {
            throw new GeneratorException(
                "Only local \$ref pointers are supported (must start with '#/'), got: $ref",
            );
        }

        $node = $this->data;

        foreach (explode('/', substr($ref, 2)) as $segment) {
            $key = str_replace(['~1', '~0'], ['/', '~'], rawurldecode($segment));

            if (!is_array($node) || !array_key_exists($key, $node)) {
                throw new GeneratorException("Unresolvable \$ref: $ref");
            }

            $node = $node[$key];
        }

        if (!is_array($node)) {
            throw new GeneratorException("\$ref does not point at an object: $ref");
        }

        /** @var array<string, mixed> $node */
        return $node;
    }

    /**
     * The last segment of a pointer — the component name.
     * `#/components/schemas/simple-user` -> `simple-user`.
     */
    public static function refName(string $ref): string
    {
        $position = strrpos($ref, '/');

        return $position === false ? $ref : substr($ref, $position + 1);
    }
}
