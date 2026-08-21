<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Check Dependabot security updates
 * @link https://docs.github.com/
 */
class CheckAutomatedSecurityFixes
{
    use DataModel;

    /** @see $enabled */
    public const enabled = 'enabled';
    #[Describe(['nullable' => true])]
    public ?bool $enabled = null;

    /** @see $paused */
    public const paused = 'paused';
    #[Describe(['nullable' => true])]
    public ?bool $paused = null;
}
