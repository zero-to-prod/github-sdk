<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Provides details of static public IP limits for GitHub-hosted Hosted
 * Runners
 * @link https://docs.github.com/
 */
class ActionsHostedRunnerLimitsPublicIps
{
    use DataModel;

    /** @see $maximum */
    public const maximum = 'maximum';
    #[Describe(['nullable' => true])]
    public ?int $maximum = null;

    /** @see $current_usage */
    public const current_usage = 'current_usage';
    #[Describe(['nullable' => true])]
    public ?int $current_usage = null;
}
