<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Internal;

use Attribute;

/**
 * Declares an API method on GitHubSdk backed by this route case.
 * Repeatable — one attribute per HTTP operation on the same path.
 *
 * `$request`, `$response` and `$listOf` accept either a short model class name
 * (`'AccountResponse'`) or a fully-qualified class string (`Account::class`).
 * The runtime still resolves to `GitHubSdkConfig::model_namespace` first
 * so published overrides keep working; the declared class acts as the fallback.
 *
 * `$response` means "the body is one object"; `$listOf` means "the body is a
 * bare JSON array of this class". They are mutually exclusive — declare one or
 * neither. When both are present `$listOf` wins.
 *
 * @internal
 */
#[Attribute(Attribute::TARGET_CLASS_CONSTANT | Attribute::IS_REPEATABLE)]
class AdminApi
{
    /**
     * @param  string[]  $pathParams   Positional args that replace {placeholders} in the route path.
     * @param  string[]  $queryParams  Query parameter names accepted via $options[Options::query].
     */
    public function __construct(
        public readonly HttpMethod $method,
        public readonly string     $name,
        public readonly array      $pathParams = [],
        public readonly array      $queryParams = [],
        public readonly ?string    $request = null,
        public readonly ?string    $response = null,
        public readonly ?string    $listOf = null,
    ) {}

    /**
     * Short class name (basename) for a `$request`/`$response` value. Returns
     * `'AccountResponse'` for both `'AccountResponse'` and `'Foo\\AccountResponse'`.
     */
    public static function shortName(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        if (!str_contains($value, '\\')) {
            return $value;
        }

        $last = strrchr($value, '\\');

        return $last === false ? $value : substr($last, 1);
    }

    /**
     * Fallback FQCN for a `$request`/`$response` value. Returns the input
     * unchanged when it's already a FQN; otherwise prefixes the package
     * `Models\\` namespace (used when `model_namespace` has no override).
     */
    public static function defaultFqcn(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return str_contains($value, '\\')
            ? $value
            : 'Zerotoprod\\GitHubSdk\\Models\\' . $value;
    }
}
