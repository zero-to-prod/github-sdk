<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Generator;

/**
 * What a request or response body maps to, in `#[AdminApi]` terms.
 *
 * A body is one of three things, and the attribute spells each differently:
 * one object (`response:`), a bare JSON array of objects (`listOf:`), or
 * nothing the SDK can hydrate (neither argument, plus a counted {@see Skip}).
 * Both fields null is that third case.
 *
 * @internal
 */
final class BodySpec
{
    /**
     * @param string|null $class  Model class for a body that is one object.
     * @param string|null $listOf Element model class for a body that is a bare JSON array.
     */
    public function __construct(
        public readonly ?string $class = null,
        public readonly ?string $listOf = null,
    ) {}
}
