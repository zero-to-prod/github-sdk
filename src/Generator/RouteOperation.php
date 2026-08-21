<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Generator;

/**
 * One `#[AdminApi]` attribute to emit: an HTTP operation on a route case.
 *
 * @internal
 */
final class RouteOperation
{
    /**
     * @param string      $httpMethod  Uppercase verb, matching an `Internal\HttpMethod` case.
     * @param string      $name        Public API method name on the SDK API class.
     * @param list<string> $pathParams `{placeholder}` names, in path order.
     * @param list<string> $queryParams Accepted query parameter names.
     * @param string|null $request     Request body model class, short name.
     * @param string|null $response    2xx response model class, short name — a body that is one object.
     * @param string|null $listOf      Element model class, short name — a body that is a bare JSON array.
     */
    public function __construct(
        public readonly string $httpMethod,
        public readonly string $name,
        public readonly array $pathParams = [],
        public readonly array $queryParams = [],
        public readonly ?string $request = null,
        public readonly ?string $response = null,
        public readonly ?string $listOf = null,
        public readonly bool $deprecated = false,
    ) {}
}
