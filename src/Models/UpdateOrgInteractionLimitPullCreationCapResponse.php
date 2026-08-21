<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgInteractionLimitPullCreationCapResponse
{
    use DataModel;

    /** @see $enabled */
    public const enabled = 'enabled';
    #[Describe(['nullable' => true])]
    public ?bool $enabled = null;

    /** @see $max_open_pull_requests */
    public const max_open_pull_requests = 'max_open_pull_requests';
    #[Describe(['nullable' => true])]
    public ?int $max_open_pull_requests = null;
}
