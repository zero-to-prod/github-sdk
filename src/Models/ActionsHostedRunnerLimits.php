<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ActionsHostedRunnerLimits
{
    use DataModel;

    /** @see $public_ips */
    public const public_ips = 'public_ips';
    #[Describe(['nullable' => true])]
    public ?ActionsHostedRunnerLimitsPublicIps $public_ips = null;
}
