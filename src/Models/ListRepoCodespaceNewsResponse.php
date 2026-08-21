<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoCodespaceNewsResponse
{
    use DataModel;

    /** @see $billable_owner */
    public const billable_owner = 'billable_owner';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $billable_owner = null;

    /** @see $defaults */
    public const defaults = 'defaults';
    #[Describe(['nullable' => true])]
    public ?ListRepoCodespaceNewsResponseDefaults $defaults = null;
}
