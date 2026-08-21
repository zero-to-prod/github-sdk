<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ActionsSetDefaultWorkflowPermissions
{
    use DataModel;

    /** @see $default_workflow_permissions */
    public const default_workflow_permissions = 'default_workflow_permissions';
    #[Describe(['nullable' => true])]
    public ?ActionsDefaultWorkflowPermissions $default_workflow_permissions = null;

    /** @see $can_approve_pull_request_reviews */
    public const can_approve_pull_request_reviews = 'can_approve_pull_request_reviews';
    #[Describe(['nullable' => true])]
    public ?bool $can_approve_pull_request_reviews = null;
}
