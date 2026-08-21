<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgCopilotSpaceCollaboratorRequest
{
    use DataModel;

    /** @see $role */
    public const role = 'role';
    #[Describe(['default' => CopilotSpaceBaseRole::unknown])]
    public CopilotSpaceBaseRole $role;
}
