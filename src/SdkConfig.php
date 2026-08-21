<?php

namespace Zerotoprod\Sdk;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\Sdk\Internal\DataModel;

/**
 * SDK connection configuration. Pass as an associative array
 * to the SdkApi constructor using these class constants as keys.
 *
 * Settings:
 *
 *  - {@see $url}             base URL every route is appended to
 *  - {@see $model_namespace} namespace searched first for request/response models
 *  - {@see $route_enum}      enum the dispatcher resolves API method names against
 *
 * @phpstan-consistent-constructor
 */
class SdkConfig
{
    use DataModel;

    /**
     * @see $url
     */
    public const url = 'url';
    /**
     * SDK base URL used for API calls. Defaults to an empty
     * string so tests don't need to configure a host — `Http::fake()` can
     * intercept with a closure matcher. Override in production.
     */
    #[Describe(['default' => ''])]
    public readonly string $url;

    /**
     * @see $model_namespace
     */
    public const model_namespace = 'model_namespace';
    /**
     * Namespace for request/response model classes. Override to use published models.
     */
    #[Describe(['default' => 'Zerotoprod\\Sdk\\Models'])]
    public readonly string $model_namespace;

    /**
     * @see $route_enum
     */
    public const route_enum = 'route_enum';
    /**
     * String-backed enum the dispatcher reflects over to resolve an API method
     * name to its route and `#[AdminApi]` attribute. Defaults to the package's
     * own {@see ApiRoute}, which `./run generate-sdk` rewrites from the OpenAPI
     * document.
     *
     * Point it at any other string-backed enum carrying `#[AdminApi]`
     * attributes to dispatch a different route set from the same client. The
     * template's own test suite does exactly that, so the tests for the shared
     * dispatcher never depend on the generated route set. Resolution is cached
     * per enum class, so several enums coexist in one process.
     *
     * @var class-string<\BackedEnum>
     */
    #[Describe(['default' => ApiRoute::class])]
    public readonly string $route_enum;

    /**
     * Build a SdkConfig from an associative array.
     *
     * @internal
     * @param  array<string, mixed>  $config
     */
    public static function fromConfig(array $config): self
    {
        return self::from($config);
    }
}
