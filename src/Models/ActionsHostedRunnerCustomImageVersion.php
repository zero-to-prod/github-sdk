<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Provides details of a hosted runner custom image version
 * @link https://docs.github.com/
 */
class ActionsHostedRunnerCustomImageVersion
{
    use DataModel;

    /** @see $version */
    public const version = 'version';
    #[Describe(['nullable' => true])]
    public ?string $version = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?string $state = null;

    /** @see $size_gb */
    public const size_gb = 'size_gb';
    #[Describe(['nullable' => true])]
    public ?int $size_gb = null;

    /** @see $created_on */
    public const created_on = 'created_on';
    #[Describe(['nullable' => true])]
    public ?string $created_on = null;

    /** @see $state_details */
    public const state_details = 'state_details';
    #[Describe(['nullable' => true])]
    public ?string $state_details = null;
}
