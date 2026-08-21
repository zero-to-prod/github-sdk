<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ParticipationStats
{
    use DataModel;

    /** @see $all */
    public const all = 'all';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $all;

    /** @see $owner */
    public const owner = 'owner';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $owner;
}
