<?php

declare(strict_types=1);

namespace Tests\Fixtures\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\Sdk\Internal\DataModel;
use Zerotoprod\Sdk\Models\Pagination;

/**
 * Collection response. Nests the package's own retained `Pagination` model, so
 * the shared suite keeps exercising it in a generated package too.
 */
class FixtureThingsResponse
{
    use DataModel;

    public const things = 'things';
    /** @var array<int, FixtureThing> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => FixtureThing::class,
        'default' => [],
    ])]
    public array $things;

    public const Pagination = 'Pagination';
    #[Describe(['nullable' => true])]
    public ?Pagination $Pagination = null;
}
