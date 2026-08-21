<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgCopilotSpaceCollaboratorRequest
{
    use DataModel;

    /** @see $actor_type */
    public const actor_type = 'actor_type';
    #[Describe(['default' => DeploymentReviewerType::unknown])]
    public DeploymentReviewerType $actor_type;

    /** @see $actor_identifier */
    public const actor_identifier = 'actor_identifier';
    #[Describe(['nullable' => true])]
    public ?string $actor_identifier = null;

    /** @see $role */
    public const role = 'role';
    #[Describe(['default' => CopilotSpaceCollaboratorVariant1Role::unknown])]
    public CopilotSpaceCollaboratorVariant1Role $role;
}
