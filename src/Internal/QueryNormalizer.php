<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Internal;

use Zerotoprod\Sdk\Models\Query;

/**
 * Translates Laravel-style query DSL into the wire format the server consumes.
 *
 * `where`:
 *   - flat 2-tuple `['col', 'val']`         → `[['col', 'val']]`
 *   - flat 3-tuple `['col', 'op', 'val']`   → `[['col', 'op', 'val']]`
 *   - list of tuples / assoc map            → passed through
 *
 * `with` (Eloquent-style eager loading):
 *   - string `'account'` or `'author.contacts'` → passed through unchanged
 *   - list `['account', 'mfa']`                 → comma-joined
 *   - nested `['author' => ['contacts', ...]]`  → flattened to dotted paths, comma-joined
 *
 * `fields` (sparse fieldsets):
 *   - `['relation' => ['col1', 'col2']]` → `['relation' => 'col1,col2']` on the wire.
 *
 * `where_in` / `where_not_in` (`IN` / `NOT IN` filters) and `per_page`
 * (pagination) are accepted DSL keys but require no transformation — they are
 * passed through unchanged. See {@see \Zerotoprod\Sdk\Models\Query}.
 *
 * @internal
 */
class QueryNormalizer
{
    /**
     * @param  array<string, mixed>  $query
     * @return array<string, mixed>
     */
    public static function normalize(array $query): array
    {
        if (array_key_exists(Query::where, $query) && is_array($query[Query::where])) {
            $query[Query::where] = self::normalizeWhere($query[Query::where]);
        }

        if (array_key_exists(Query::with, $query)) {
            $query[Query::with] = self::normalizeWith($query[Query::with]);
        }

        if (array_key_exists(Query::fields, $query) && is_array($query[Query::fields])) {
            /** @var array<string, mixed> $fields */
            $fields = $query[Query::fields];
            $query[Query::fields] = self::normalizeFields($fields);
        }

        return $query;
    }

    /**
     * @param  array<string, mixed>  $fields
     * @return array<string, string>
     */
    private static function normalizeFields(array $fields): array
    {
        $out = [];

        foreach ($fields as $relation => $columns) {
            if (is_array($columns)) {
                /** @var array<string> $columns */
                $out[$relation] = implode(',', $columns);
            }
        }

        return $out;
    }

    /**
     * @param  array<int|string, mixed>  $where
     * @return array<int|string, mixed>
     */
    private static function normalizeWhere(array $where): array
    {
        if ($where === []) {
            return $where;
        }

        $first = array_key_first($where);

        if (is_string($first)) {
            return $where;
        }

        $head = $where[$first];
        $count = count($where);

        if (is_string($head) && ($count === 2 || $count === 3)) {
            return [array_values($where)];
        }

        return $where;
    }

    private static function normalizeWith(mixed $with): string
    {
        if (is_string($with)) {
            return $with;
        }

        if (! is_array($with)) {
            return '';
        }

        return implode(',', self::flattenWith($with));
    }

    /**
     * @param  array<int|string, mixed>  $with
     * @return string[]
     */
    private static function flattenWith(array $with, string $prefix = ''): array
    {
        $out = [];

        foreach ($with as $key => $item) {
            if (is_int($key)) {
                if (is_string($item) && $item !== '') {
                    $out[] = $prefix === '' ? $item : $prefix . '.' . $item;
                } elseif (is_array($item) && $prefix !== '') {
                    $out = [...$out, ...self::flattenWith($item, $prefix)];
                }

                continue;
            }

            $next = $prefix === '' ? $key : $prefix . '.' . $key;

            if (is_array($item)) {
                $out = [...$out, ...self::flattenWith($item, $next)];
            } elseif (is_string($item) && $item !== '') {
                $out[] = $next . '.' . $item;
            }
        }

        return $out;
    }
}
