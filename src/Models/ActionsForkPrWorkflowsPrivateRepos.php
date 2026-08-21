<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ActionsForkPrWorkflowsPrivateRepos
{
    use DataModel;

    /** @see $run_workflows_from_fork_pull_requests */
    public const run_workflows_from_fork_pull_requests = 'run_workflows_from_fork_pull_requests';
    #[Describe(['nullable' => true])]
    public ?bool $run_workflows_from_fork_pull_requests = null;

    /** @see $send_write_tokens_to_workflows */
    public const send_write_tokens_to_workflows = 'send_write_tokens_to_workflows';
    #[Describe(['nullable' => true])]
    public ?bool $send_write_tokens_to_workflows = null;

    /** @see $send_secrets_and_variables */
    public const send_secrets_and_variables = 'send_secrets_and_variables';
    #[Describe(['nullable' => true])]
    public ?bool $send_secrets_and_variables = null;

    /** @see $require_approval_for_fork_pr_workflows */
    public const require_approval_for_fork_pr_workflows = 'require_approval_for_fork_pr_workflows';
    #[Describe(['nullable' => true])]
    public ?bool $require_approval_for_fork_pr_workflows = null;
}
