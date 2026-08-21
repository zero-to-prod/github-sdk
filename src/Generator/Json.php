<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Generator;

/**
 * Narrowing accessors for decoded JSON. An OpenAPI document is `mixed` all the
 * way down; these turn a node into a shape PHPStan can reason about without
 * sprinkling `is_array()` through every mapper.
 *
 * @internal
 */
final class Json
{
    /**
     * A node as a string-keyed map. Anything else (scalar, list, null) is an
     * empty map — an absent object and a malformed one are handled alike.
     *
     * Caution: PHP canonicalises a numeric JSON key into an `int` array key and
     * will not let it be cast back, so a property literally named `-1` or a
     * response code of `200` arrives as an integer no matter what this declares.
     * Iterate keys with `(string)` applied at the loop, never hand a raw key
     * straight to a `string` parameter.
     *
     * @return array<string, mixed>
     */
    public static function map(mixed $value): array
    {
        if (!is_array($value)) {
            return [];
        }

        /** @var array<string, mixed> $value */
        return $value;
    }

    /**
     * A node as a positional list. Preserves element types verbatim.
     *
     * @return list<mixed>
     */
    public static function listOf(mixed $value): array
    {
        return is_array($value) ? array_values($value) : [];
    }

    /**
     * A node as a non-empty string, or null. Empty strings collapse to null so
     * callers can use `??` for "absent or blank".
     */
    public static function str(mixed $value): ?string
    {
        return is_string($value) && $value !== '' ? $value : null;
    }

    /**
     * A node as a list of strings, dropping non-string members.
     *
     * @return list<string>
     */
    public static function strings(mixed $value): array
    {
        return array_values(array_filter(self::listOf($value), is_string(...)));
    }

    /**
     * Strict `true` test — OpenAPI booleans are sometimes strings in the wild.
     */
    public static function isTrue(mixed $value): bool
    {
        return $value === true || $value === 'true';
    }
}
