<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgActionRunnerGroupRunnerRequest
{
    use DataModel;

    /** @see $runners */
    public const runners = 'runners';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $runners;
}
