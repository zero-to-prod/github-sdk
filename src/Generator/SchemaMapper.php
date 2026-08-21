<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Generator;

/**
 * Turns OpenAPI schemas into the `Models`/`Enums` arrays the data-model
 * generator's `Engine` consumes.
 *
 * This is the layer that exists because the off-the-shelf OpenAPI adapter is
 * not enough: it walks only `components.schemas`, drops `allOf` on the floor
 * (silently emitting empty classes), never reads `paths`, and suffixes every
 * enum unconditionally. Everything here is deliberate:
 *
 *  - `allOf` is **merged** into one flat class — members' `properties` and
 *    `required` are folded together, later members and the schema's own
 *    properties winning, so a composed schema is not an empty shell.
 *  - A single-member `allOf` around a `$ref` is the "nullable wrapper" idiom
 *    and reuses the target's class instead of cloning it.
 *  - `nullable-x` reuses `x`'s class **only when `x` actually exists**; the
 *    prefix alone means nothing (the GitHub spec has 8 `nullable-*` schemas
 *    with no twin, which must get classes of their own).
 *  - Enum values are sanitised into identifiers with the raw value kept as the
 *    backing value, and enums that cannot be PHP backed enums at all
 *    (mixed-type, boolean-only) degrade to a scalar type and are counted.
 *  - Everything not representable is recorded as a {@see Skip}. Nothing is
 *    dropped quietly.
 *  - What no API method can reach is not emitted at all — see
 *    {@see self::prune()}, which counts what it drops rather than listing it.
 *
 * @internal
 */
final class SchemaMapper
{
    /** Cast expression for a list of models. The Normalizer shortens it. */
    public const MAP_OF = "[\\Zerotoprod\\DataModelHelper\\DataModelHelper::class, 'mapOf']";

    /** Order `#[Describe]` entries are rendered in, so output is stable. */
    public const DESCRIBE_ORDER = ['cast', 'type', 'method', 'from', 'nullable', 'default'];

    /** Longest `allOf` nesting merged before giving up on a cyclic composition. */
    public const MAX_MERGE_DEPTH = 32;

    private const SCHEMA_POINTER = '#/components/schemas/';

    /** @var array<string, array<string, mixed>> class name => Model array */
    private array $models = [];

    /** @var array<string, array<string, mixed>> class name => Enum array */
    private array $enums = [];

    /** @var array<string, TypeSpec> pointer => resolved spec (also the cycle guard) */
    private array $specs = [];

    /** @var array<string, string> value signature => enum class name */
    private array $enumSignatures = [];

    /** @var list<Skip> */
    private array $skips = [];

    /** @var array<string, true> Body classes an API method hydrates — the roots of the reachability walk. */
    private array $roots = [];

    /** @var array<string, array<string, true>> class => every class mentioned anywhere in its schema tree */
    private array $references = [];

    /** @var list<string> Classes whose properties are being walked, innermost last. */
    private array $owners = [];

    private int $reusedEnums = 0;

    public function __construct(
        private readonly Document $document,
        private readonly Naming $naming,
        private readonly string $docsUrl,
    ) {}

    // ─── Entry points ──────────────────────────────────────────────────

    /**
     * Map every schema under `components.schemas`. Run this before mapping
     * paths so named schemas claim their canonical class names first and
     * inline promotions take the discriminators.
     */
    public function mapComponentSchemas(): void
    {
        foreach ($this->document->schemas() as $name => $schema) {
            // A numeric schema name arrives as an int; see Json::map().
            $name = (string) $name;
            $this->named(self::SCHEMA_POINTER . $name, $name, Json::map($schema));
        }
    }

    /**
     * The model class for a request or response body, or null when the body is
     * not an object (an array or a scalar) and therefore has no class to
     * hydrate into. `$subject` names the operation in the skip report.
     *
     * @param array<string, mixed> $schema
     */
    public function bodyClass(array $schema, string $suggested, string $subject): ?string
    {
        $spec = $this->typeFor($schema, $suggested);

        if ($spec->className !== null && !$spec->isEnum) {
            $this->roots[$spec->className] = true;

            return $spec->className;
        }

        // The doc type when there is one, so a free-form map and a list of
        // scalars are told apart in the report rather than both reading `array`.
        $this->skips[] = new Skip(
            Skip::BODY,
            $subject,
            'body schema is `' . ($spec->docType ?? implode('|', $spec->types))
            . '`, not an object — no model emitted, raw value passed through',
        );

        return null;
    }

    /**
     * A response body, which — unlike a request body — may legitimately be a
     * bare JSON array. `{"type": "array", "items": {…}}` yields the element
     * class for the attribute's `listOf:` argument; anything else falls through
     * to {@see self::bodyClass()} and its `response:` argument. Exactly one skip
     * is recorded per body, whichever way it goes.
     *
     * @param array<string, mixed> $schema
     */
    public function responseBody(array $schema, string $suggested, string $subject): BodySpec
    {
        $resolved = $this->document->resolve($schema);

        if (in_array('array', $this->typeNames($resolved), true)) {
            return $this->listBody($resolved, $suggested, $subject);
        }

        return new BodySpec($this->bodyClass($schema, $suggested, $subject));
    }

    /**
     * The element class of a bare-array body. A list of scalars — or of
     * anything else without a class of its own, an enum included, since
     * `Enum::from()` cannot hydrate an array element — needs no model and is
     * counted instead.
     *
     * @param array<string, mixed> $schema
     */
    private function listBody(array $schema, string $suggested, string $subject): BodySpec
    {
        $items = Json::map($schema['items'] ?? null);
        $item = $items === [] ? TypeSpec::of('mixed') : $this->typeFor($items, $suggested . 'Item');

        if ($item->className !== null && !$item->isEnum) {
            $this->roots[$item->className] = true;

            return new BodySpec(null, $item->className);
        }

        $this->skips[] = new Skip(
            Skip::BODY,
            $subject,
            'body schema is a list of `' . ($item->docType ?? implode('|', $item->types))
            . '` — no element model emitted, raw value passed through',
        );

        return new BodySpec();
    }

    /**
     * The PHP type for any schema node, promoting inline objects and enums to
     * named classes as it goes. `$suggested` is the class name an inline
     * promotion should try to take.
     *
     * @param array<string, mixed> $schema
     */
    public function typeFor(array $schema, string $suggested): TypeSpec
    {
        $ref = Json::str($schema['$ref'] ?? null);
        $spec = $ref !== null ? $this->typeForRef($ref) : $this->typeForInline($schema, $suggested);

        if ($spec->className !== null) {
            $this->reference($spec->className);
        }

        return $spec;
    }

    /**
     * Drop every class no API method can reach, and return how many went.
     *
     * A document's `components.schemas` is a superset of what the SDK can use:
     * GitHub declares 969 named schemas, of which 339 are reachable only from
     * `x-webhooks`. Emitting those with `--webhooks` off gives the package
     * thousands of classes nothing can ever return. So the walk starts at the
     * bodies API methods actually hydrate — the roots registered by
     * {@see self::bodyClass()} and {@see self::responseBody()}, which is where
     * `--webhooks` decides whether webhook payloads count — and keeps only what
     * those reach transitively through `$ref`s, `allOf`/`oneOf`/`anyOf` members,
     * `items`, `additionalProperties` and promoted inline schemas.
     *
     * Reachability is the only criterion. A name is never one: `WebhookConfig`
     * is a webhook-shaped name on a schema three path operations return, and
     * pruning by prefix would delete a class the SDK needs.
     *
     * Run this after the routes are mapped — a `listOf:` element class becomes
     * a root only once the route mapper has decided on it.
     */
    public function prune(): int
    {
        /** @var array<string, true> $keep */
        $keep = [];
        $queue = array_keys($this->roots);

        while ($queue !== []) {
            $class = array_pop($queue);

            if (isset($keep[$class])) {
                continue;
            }

            $keep[$class] = true;
            $queue = [...$queue, ...array_keys($this->references[$class] ?? [])];
        }

        $before = count($this->models) + count($this->enums);
        $this->models = array_intersect_key($this->models, $keep);
        $this->enums = array_intersect_key($this->enums, $keep);

        return $before - count($this->models) - count($this->enums);
    }

    /** @return array{Models: array<string, array<string, mixed>>, Enums: array<string, array<string, mixed>>} */
    public function components(): array
    {
        $models = $this->models;
        $enums = $this->enums;
        ksort($models);
        ksort($enums);

        return ['Models' => $models, 'Enums' => $enums];
    }

    /** @return list<Skip> */
    public function skips(): array
    {
        return $this->skips;
    }

    public function modelCount(): int
    {
        return count($this->models);
    }

    public function enumCount(): int
    {
        return count($this->enums);
    }

    /** Inline enums that reused an identical enum class instead of cloning it. */
    public function reusedEnumCount(): int
    {
        return $this->reusedEnums;
    }

    // ─── Named schemas ─────────────────────────────────────────────────

    private function typeForRef(string $ref): TypeSpec
    {
        $name = Document::refName($ref);

        // `nullable-simple-user` is `simple-user` plus a nullable property —
        // but only when `simple-user` is really there to point at.
        if (str_starts_with($ref, self::SCHEMA_POINTER)) {
            $twin = preg_replace('/^nullable[-_]/', '', $name, 1) ?? $name;

            if ($twin !== $name && $this->document->hasSchema($twin)) {
                $this->skips[] = new Skip(
                    Skip::SCHEMA,
                    $name,
                    "nullable twin of `$twin` — reuses that class with a nullable property",
                );

                return $this->typeForRef(self::SCHEMA_POINTER . $twin)->asNullable();
            }
        }

        return $this->named($ref, $name, $this->document->pointer($ref));
    }

    /**
     * Resolve a named schema to a spec, emitting its class the first time and
     * memoising it. The memo is written before properties are walked, so a
     * schema that references itself terminates instead of recursing forever.
     *
     * @param array<string, mixed> $schema
     */
    private function named(string $pointer, string $rawName, array $schema): TypeSpec
    {
        if (isset($this->specs[$pointer])) {
            return $this->specs[$pointer];
        }

        $inner = Json::str($schema['$ref'] ?? null);

        if ($inner !== null) {
            $this->skips[] = new Skip(
                Skip::SCHEMA,
                $rawName,
                'plain alias of `' . Document::refName($inner) . '` — reuses that class',
            );

            return $this->specs[$pointer] = $this->typeForRef($inner);
        }

        $wrapped = $this->singleRefAllOf($schema);

        if ($wrapped !== null) {
            $this->skips[] = new Skip(
                Skip::SCHEMA,
                $rawName,
                'single-member allOf around `' . Document::refName($wrapped) . '` — reuses that class',
            );
            $spec = $this->typeForRef($wrapped);

            return $this->specs[$pointer] = $this->isNullable($schema) ? $spec->asNullable() : $spec;
        }

        $enumValues = Json::listOf($schema['enum'] ?? null);

        if ($enumValues !== []) {
            return $this->specs[$pointer] = $this->buildEnum($rawName, $rawName, $schema, $enumValues, false);
        }

        if ($this->isObjectLike($schema)) {
            $class = $this->naming->className($rawName);
            $spec = new TypeSpec([$class], false, [], null, $class);
            $this->specs[$pointer] = $spec;
            $this->buildModel($class, $schema);

            return $spec;
        }

        $spec = $this->typeForInline($schema, $rawName);
        $this->skips[] = new Skip(
            Skip::SCHEMA,
            $rawName,
            'not an object schema — mapped to `' . implode('|', $spec->types) . '`, no class emitted',
        );

        return $this->specs[$pointer] = $spec;
    }

    // ─── Inline schemas ────────────────────────────────────────────────

    /** @param array<string, mixed> $schema */
    private function typeForInline(array $schema, string $suggested): TypeSpec
    {
        $nullable = $this->isNullable($schema);

        if (Json::listOf($schema['allOf'] ?? null) !== []) {
            $wrapped = $this->singleRefAllOf($schema);

            if ($wrapped !== null) {
                $spec = $this->typeForRef($wrapped);

                return $nullable ? $spec->asNullable() : $spec;
            }

            $class = $this->naming->className($suggested);
            $this->buildModel($class, $this->mergeAllOf($schema));

            return new TypeSpec([$class], $nullable, [], null, $class);
        }

        $union = Json::listOf($schema['oneOf'] ?? null);
        $kind = 'oneOf';

        if ($union === []) {
            $union = Json::listOf($schema['anyOf'] ?? null);
            $kind = 'anyOf';
        }

        if ($union !== []) {
            return $this->unionType($union, $suggested, $nullable, $kind);
        }

        $enumValues = Json::listOf($schema['enum'] ?? null);

        if ($enumValues !== []) {
            $spec = $this->buildEnum($suggested, $suggested, $schema, $enumValues, true);

            return $nullable ? $spec->asNullable() : $spec;
        }

        if ($this->isObjectLike($schema)) {
            $class = $this->naming->className($suggested);
            $this->buildModel($class, $schema);

            return new TypeSpec([$class], $nullable, [], null, $class);
        }

        return $this->scalarOrArray($schema, $suggested, $nullable);
    }

    /**
     * A union of member types. A single object member collapses to that class;
     * all-scalar members become a real PHP union; anything mixing objects with
     * scalars, or naming two different objects, widens to a free-form map,
     * because no hydrator can pick between them.
     *
     * @param list<mixed> $members
     */
    private function unionType(array $members, string $suggested, bool $nullable, string $kind): TypeSpec
    {
        /** @var array<string, TypeSpec> $classes */
        $classes = [];
        /** @var array<string, true> $scalars */
        $scalars = [];
        $index = 0;

        foreach ($members as $member) {
            $index++;
            $schema = Json::map($member);

            if ($this->typeNames($schema) === ['null']) {
                $nullable = true;
                continue;
            }

            if ($schema === []) {
                $scalars['mixed'] = true;
                continue;
            }

            $spec = $this->typeFor($schema, $suggested . 'Variant' . $index);
            $nullable = $nullable || $spec->nullable;

            if ($spec->className !== null) {
                $classes[$spec->className] = $spec;
                continue;
            }

            foreach ($spec->types as $type) {
                $scalars[$type] = true;
            }
        }

        if (count($classes) === 1 && $scalars === []) {
            $spec = reset($classes);

            return $nullable ? $spec->asNullable() : $spec;
        }

        if ($classes === []) {
            $types = array_keys($scalars);

            if ($types === [] || in_array('mixed', $types, true)) {
                return TypeSpec::of('mixed');
            }

            return new TypeSpec($types, $nullable);
        }

        $this->skips[] = new Skip(
            Skip::PROPERTY,
            $suggested,
            "$kind mixes " . count($classes) . ' object schema(s) with ' . count($scalars)
            . ' scalar type(s) — widened to a free-form map, members not hydrated',
        );

        return new TypeSpec(['array'], $nullable, [], 'array<string, mixed>');
    }

    /** @param array<string, mixed> $schema */
    private function scalarOrArray(array $schema, string $suggested, bool $nullable): TypeSpec
    {
        $types = array_values(array_diff($this->typeNames($schema), ['null']));

        if (in_array('array', $types, true)) {
            return $this->arrayType($schema, $suggested, $nullable);
        }

        if ($types === ['object'] || ($types === [] && array_key_exists('additionalProperties', $schema))) {
            return $this->freeFormMap($schema, $suggested, $nullable);
        }

        if ($types === []) {
            return TypeSpec::of('mixed');
        }

        $php = array_values(array_unique(array_map($this->scalar(...), $types)));

        return in_array('mixed', $php, true) ? TypeSpec::of('mixed') : new TypeSpec($php, $nullable);
    }

    /**
     * A list. `items.$ref` gets the `mapOf` cast so elements hydrate into
     * models; enum elements use `tryFrom` so an unrecognised value yields null
     * rather than throwing. Scalar and untyped lists get a `@var` only.
     *
     * @param array<string, mixed> $schema
     */
    private function arrayType(array $schema, string $suggested, bool $nullable): TypeSpec
    {
        $items = Json::map($schema['items'] ?? null);

        if ($items === []) {
            return new TypeSpec(['array'], $nullable, [], 'array<int, mixed>');
        }

        $item = $this->typeFor($items, $suggested . 'Item');

        if ($item->className !== null) {
            $describe = ['cast' => self::MAP_OF, 'type' => $item->className . '::class'];
            $element = $item->className;

            if ($item->isEnum) {
                $describe['method'] = "'tryFrom'";
                $element .= '|null';
            }

            return new TypeSpec(['array'], $nullable, $describe, "array<int, $element>");
        }

        $element = $item->docType ?? implode('|', $item->types);

        return new TypeSpec(['array'], $nullable, [], "array<int, $element>");
    }

    /**
     * A free-form object — `additionalProperties` with no declared
     * `properties`. Values stay `mixed` unless `additionalProperties` names a
     * type, and are never hydrated into models (there is no cast for a
     * string-keyed map of objects).
     *
     * @param array<string, mixed> $schema
     */
    private function freeFormMap(array $schema, string $suggested, bool $nullable): TypeSpec
    {
        $additional = Json::map($schema['additionalProperties'] ?? null);
        $element = 'mixed';

        if ($additional !== []) {
            $value = $this->typeFor($additional, $suggested . 'Value');
            $element = $value->docType ?? implode('|', $value->types);

            if ($value->className !== null) {
                $this->skips[] = new Skip(
                    Skip::PROPERTY,
                    $suggested,
                    "additionalProperties names `$element` — kept as a string-keyed array, values not hydrated",
                );
            }
        }

        return new TypeSpec(['array'], $nullable, [], "array<string, $element>");
    }

    // ─── Enums ─────────────────────────────────────────────────────────

    /**
     * Build a PHP backed enum, or fall back to a scalar when the values cannot
     * be one.
     *
     * String-backed enums gain a leading `unknown` case so a value the document
     * did not list never throws on the way in. Integer-backed enums get no such
     * case — any sentinel int could collide with a real value.
     *
     * Inline enums are deduplicated by value signature: dozens of identical
     * `["open","closed"]` declarations share one class rather than emitting one
     * per property. Named component enums always get their own class so `$ref`s
     * keep resolving by name.
     *
     * @param array<string, mixed> $schema
     * @param list<mixed>          $values
     */
    private function buildEnum(string $rawName, string $suggested, array $schema, array $values, bool $inline): TypeSpec
    {
        $nullable = $this->isNullable($schema) || in_array(null, $values, true);
        $values = array_values(array_filter($values, static fn(mixed $value): bool => $value !== null));
        $kinds = array_values(array_unique(array_map(get_debug_type(...), $values)));

        if ($values === []) {
            $this->skips[] = new Skip(Skip::ENUM, $rawName, 'enum lists no values other than null — typed from `type` instead');

            return $this->scalarOrArray($schema, $suggested, true);
        }

        if (count($kinds) > 1 || !in_array($kinds[0], ['string', 'int'], true)) {
            $this->skips[] = new Skip(
                Skip::ENUM,
                $rawName,
                'enum values are ' . (count($kinds) > 1 ? 'mixed-type' : $kinds[0])
                . ' (' . implode(', ', $kinds) . ') — cannot be a PHP backed enum, typed as a scalar',
            );

            return $this->enumFallback($kinds, $nullable);
        }

        $backing = $kinds[0] === 'int' ? 'int' : 'string';
        /** @var array<string, true> $taken */
        $taken = [];
        /** @var array<string, array<string, string>> $cases */
        $cases = [];

        foreach ($values as $value) {
            /** @var int|string $value */
            $name = $this->unique(Naming::enumCaseName((string) $value), $taken);
            $cases[$name] = ['value' => var_export($value, true)];
        }

        $hasUnknown = $backing === 'string';

        if ($hasUnknown && !isset($cases['unknown'])) {
            $cases = ['unknown' => ['value' => "'unknown'"]] + $cases;
        }

        $signature = $backing . '|' . implode(',', array_keys($cases)) . '|'
            . implode(',', array_map(static fn(array $case): string => $case['value'], $cases));

        if ($inline && isset($this->enumSignatures[$signature])) {
            $class = $this->enumSignatures[$signature];
            $this->reusedEnums++;

            return new TypeSpec([$class], $nullable, [], null, $class, true, $hasUnknown);
        }

        $class = $this->naming->className($suggested);
        $this->enumSignatures[$signature] ??= $class;
        $this->enums[$class] = [
            'filename' => "$class.php",
            'comment' => $this->docblock(Json::str($schema['description'] ?? null)),
            'backed_type' => $backing,
            'cases' => $cases,
        ];

        return new TypeSpec([$class], $nullable, [], null, $class, true, $hasUnknown);
    }

    /** @param non-empty-list<string> $kinds */
    private function enumFallback(array $kinds, bool $nullable): TypeSpec
    {
        $types = array_values(array_unique(array_map(
            static fn(string $kind): string => match ($kind) {
                'string' => 'string',
                'int' => 'int',
                'float' => 'float',
                'bool' => 'bool',
                default => 'mixed',
            },
            $kinds,
        )));

        return in_array('mixed', $types, true) ? TypeSpec::of('mixed') : new TypeSpec($types, $nullable);
    }

    // ─── Models ────────────────────────────────────────────────────────

    /**
     * Emit one class. Every property is nullable by default — an API that omits
     * a field it documented should not break hydration — with two exceptions
     * that the house style relies on: a list stays a non-nullable `array` with
     * a `[]` default, and a required string enum stays non-nullable with
     * `unknown` as its default.
     *
     * @param array<string, mixed> $schema
     */
    private function buildModel(string $class, array $schema): void
    {
        $merged = $this->mergeAllOf($schema);
        $required = Json::strings($merged['required'] ?? null);

        /** @var array<string, array<string, mixed>> $constants */
        $constants = [];
        /** @var array<string, array<string, mixed>> $properties */
        $properties = [];
        /** @var array<string, true> $taken */
        $taken = [];

        // Everything this class's schema tree mentions is an edge out of it, so
        // the reachability walk in prune() can follow them.
        $this->owners[] = $class;

        foreach (Json::map($merged['properties'] ?? null) as $wire => $raw) {
            // A property literally named `-1` or `200` arrives as an int; see
            // Json::map(). Cast before it reaches anything typed `string`, and
            // before comparing against the string `required` list.
            $wire = (string) $wire;
            $name = $this->unique(Naming::propertyName($wire), $taken);
            $spec = $this->typeFor(Json::map($raw), $class . Naming::pascal($wire));
            $describe = $spec->describe;
            $isRequired = in_array($wire, $required, true);
            $nullable = true;

            if ($spec->isArray()) {
                $nullable = false;
            } elseif ($spec->isEnum && $spec->hasUnknown && $isRequired && !$spec->nullable) {
                $describe['default'] = $spec->className . '::unknown';
                $nullable = false;
            }

            if ($nullable) {
                $describe['nullable'] = 'true';
            }

            if ($name !== $wire) {
                $describe['from'] = "self::$name";
            }

            $properties[$name] = [
                'comment' => $spec->docType !== null ? "/** @var $spec->docType */" : null,
                'types' => $nullable ? [...$spec->types, 'null'] : $spec->types,
                'attributes' => $describe === [] ? [] : [$this->describeAttribute($describe)],
                'required' => $isRequired,
            ];
            $constants[$name] = [
                'comment' => "/** @see \$$name */",
                'value' => var_export($wire, true),
            ];
        }

        array_pop($this->owners);

        $imports = ['use Zerotoprod\Sdk\Internal\DataModel;'];

        if ($properties !== []) {
            $imports[] = 'use Zerotoprod\DataModel\Describe;';
        }

        sort($imports);

        $this->models[$class] = [
            'filename' => "$class.php",
            'comment' => $this->docblock(Json::str($merged['description'] ?? null)),
            'imports' => $imports,
            'use_statements' => ['use DataModel;'],
            'constants' => $constants,
            'properties' => $properties,
        ];
    }

    /**
     * Flatten `allOf` into one schema. Members are resolved and merged in
     * order, then the schema's own `properties`/`required` are layered on top,
     * so the most specific declaration wins. Mixed compositions (`$ref`
     * members plus an inline object) merge exactly like all-`$ref` ones.
     *
     * @param  array<string, mixed>  $schema
     * @return array<string, mixed>
     */
    private function mergeAllOf(array $schema, int $depth = 0): array
    {
        $members = Json::listOf($schema['allOf'] ?? null);

        if ($members === []) {
            return $schema;
        }

        if ($depth >= self::MAX_MERGE_DEPTH) {
            throw new GeneratorException(
                'allOf composition nested deeper than ' . self::MAX_MERGE_DEPTH
                . ' levels — the document has a cyclic allOf',
            );
        }

        /** @var array<string, mixed> $properties */
        $properties = [];
        /** @var list<string> $required */
        $required = [];
        $description = Json::str($schema['description'] ?? null);

        foreach ($members as $member) {
            $resolved = $this->mergeAllOf($this->document->resolve(Json::map($member)), $depth + 1);
            $properties = [...$properties, ...Json::map($resolved['properties'] ?? null)];
            $required = [...$required, ...Json::strings($resolved['required'] ?? null)];
            $description ??= Json::str($resolved['description'] ?? null);
        }

        // The schema's own members are layered on last so the most specific
        // declaration wins. It is never recursed into: its `allOf` is the list
        // just walked, and a member pointing back at it is a cyclic
        // composition, caught by the depth guard above.
        $properties = [...$properties, ...Json::map($schema['properties'] ?? null)];
        $required = [...$required, ...Json::strings($schema['required'] ?? null)];

        unset($schema['allOf']);

        return [
            ...$schema,
            'type' => 'object',
            'properties' => $properties,
            'required' => array_values(array_unique($required)),
            'description' => $description,
        ];
    }

    // ─── Shared helpers ────────────────────────────────────────────────

    /**
     * Record that the class currently being built mentions `$class`. Called for
     * every resolved class, however deeply nested — a list's `items`, a union
     * member, an `additionalProperties` value — so {@see self::prune()} keeps
     * anything an emitted class names, including in a `@var` docblock.
     */
    private function reference(string $class): void
    {
        $owner = end($this->owners);

        if ($owner !== false && $owner !== $class) {
            $this->references[$owner][$class] = true;
        }
    }

    /**
     * The `$ref` a schema is a bare wrapper around: a single-member `allOf`
     * pointing at a `$ref`, with no properties of its own. Null when the schema
     * is anything more than that.
     *
     * @param array<string, mixed> $schema
     */
    private function singleRefAllOf(array $schema): ?string
    {
        $members = Json::listOf($schema['allOf'] ?? null);

        if (count($members) !== 1 || Json::map($schema['properties'] ?? null) !== []) {
            return null;
        }

        return Json::str(Json::map($members[0])['$ref'] ?? null);
    }

    /** @param array<string, mixed> $schema */
    private function isObjectLike(array $schema): bool
    {
        return Json::map($schema['properties'] ?? null) !== []
            || Json::listOf($schema['allOf'] ?? null) !== [];
    }

    /** @param array<string, mixed> $schema */
    private function isNullable(array $schema): bool
    {
        return Json::isTrue($schema['nullable'] ?? null)
            || in_array('null', $this->typeNames($schema), true);
    }

    /**
     * A schema's declared types. OpenAPI 3.0 spells this as a string, 3.1 as a
     * list — `["string","null"]` is the 3.1 way to say `nullable: true`.
     *
     * @param  array<string, mixed> $schema
     * @return list<string>
     */
    private function typeNames(array $schema): array
    {
        $type = $schema['type'] ?? null;

        if (is_array($type)) {
            return Json::strings($type);
        }

        $single = Json::str($type);

        return $single === null ? [] : [$single];
    }

    private function scalar(string $type): string
    {
        return match ($type) {
            'string' => 'string',
            'integer' => 'int',
            'number' => 'float',
            'boolean' => 'bool',
            default => 'mixed',
        };
    }

    /**
     * The `#[Describe]` attribute for a property, fully qualified. The
     * Normalizer shortens the class name and reformats multi-entry payloads.
     *
     * @param array<string, string> $describe
     */
    private function describeAttribute(array $describe): string
    {
        $entries = [];

        foreach (self::DESCRIBE_ORDER as $key) {
            if (isset($describe[$key])) {
                $entries[] = "'$key' => {$describe[$key]}";
            }
        }

        return '#[\\Zerotoprod\\DataModel\\Describe([' . implode(', ', $entries) . '])]';
    }

    /** The class docblock: wrapped description, then the docs `@link`. */
    private function docblock(?string $description): string
    {
        $lines = ['/**'];

        foreach ($this->wrap($description) as $line) {
            $lines[] = rtrim(" * $line");
        }

        $lines[] = " * @link $this->docsUrl";
        $lines[] = ' */';

        return implode("\n", $lines);
    }

    /**
     * Wrap a schema description to comment width, neutralising any comment
     * terminator inside it that would close the docblock early.
     *
     * @return list<string>
     */
    private function wrap(?string $description): array
    {
        if ($description === null) {
            return [];
        }

        $text = trim((string) preg_replace('/\s+/', ' ', str_replace('*/', '* /', $description)));

        return $text === '' ? [] : explode("\n", wordwrap($text, 74));
    }

    /**
     * Reserve `$base` within `$taken`, appending `2`, `3`, ... on collision.
     * Used for member names inside one class, where two wire keys can sanitise
     * to the same identifier.
     *
     * @param array<string, true> $taken
     */
    private function unique(string $base, array &$taken): string
    {
        $name = $base;
        $suffix = 1;

        while (isset($taken[$name])) {
            $name = $base . ++$suffix;
        }

        $taken[$name] = true;

        return $name;
    }
}
