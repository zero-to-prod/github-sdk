<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Referrer Traffic
 * @link https://docs.github.com/
 */
class ReferrerTraffic
{
    use DataModel;

    /** @see $referrer */
    public const referrer = 'referrer';
    #[Describe(['nullable' => true])]
    public ?string $referrer = null;

    /** @see $count */
    public const count = 'count';
    #[Describe(['nullable' => true])]
    public ?int $count = null;

    /** @see $uniques */
    public const uniques = 'uniques';
    #[Describe(['nullable' => true])]
    public ?int $uniques = null;
}
