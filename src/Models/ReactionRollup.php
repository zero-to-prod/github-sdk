<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ReactionRollup
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $plus_1 */
    public const plus_1 = '+1';
    #[Describe([
        'from' => self::plus_1,
        'nullable' => true,
    ])]
    public ?int $plus_1 = null;

    /** @see $minus_1 */
    public const minus_1 = '-1';
    #[Describe([
        'from' => self::minus_1,
        'nullable' => true,
    ])]
    public ?int $minus_1 = null;

    /** @see $laugh */
    public const laugh = 'laugh';
    #[Describe(['nullable' => true])]
    public ?int $laugh = null;

    /** @see $confused */
    public const confused = 'confused';
    #[Describe(['nullable' => true])]
    public ?int $confused = null;

    /** @see $heart */
    public const heart = 'heart';
    #[Describe(['nullable' => true])]
    public ?int $heart = null;

    /** @see $hooray */
    public const hooray = 'hooray';
    #[Describe(['nullable' => true])]
    public ?int $hooray = null;

    /** @see $eyes */
    public const eyes = 'eyes';
    #[Describe(['nullable' => true])]
    public ?int $eyes = null;

    /** @see $rocket */
    public const rocket = 'rocket';
    #[Describe(['nullable' => true])]
    public ?int $rocket = null;
}
