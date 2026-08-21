<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateUserEmailVisibilityRequest
{
    use DataModel;

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['default' => CreateOrgRepoRequestVisibility::unknown])]
    public CreateOrgRepoRequestVisibility $visibility;
}
