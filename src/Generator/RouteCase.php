<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Generator;

/**
 * One `ApiRoute` enum case — a path, plus every operation defined on it.
 *
 * @internal
 */
final class RouteCase
{
    /** @param list<RouteOperation> $operations */
    public function __construct(
        public readonly string $name,
        public readonly string $path,
        public readonly array $operations,
        public readonly ?string $summary = null,
    ) {}
}
