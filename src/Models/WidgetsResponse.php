<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\Sdk\Internal\DataModel;

/**
 * Example collection response. Hydrated from the envelope's `data` key when
 * one is configured, otherwise from the whole body.
 * @link https://example.com/docs
 */
class WidgetsResponse
{
    use DataModel;

    /** @see $widgets */
    public const widgets = 'widgets';
    /** @var array<int, Widget> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Widget::class,
        'default' => [],
    ])]
    public array $widgets;

    /** @see $Pagination */
    public const Pagination = 'Pagination';
    #[Describe(['nullable' => true])]
    public ?Pagination $Pagination = null;
}
