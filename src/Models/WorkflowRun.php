<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * An invocation of a workflow
 * @link https://docs.github.com/
 */
class WorkflowRun
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $check_suite_id */
    public const check_suite_id = 'check_suite_id';
    #[Describe(['nullable' => true])]
    public ?int $check_suite_id = null;

    /** @see $check_suite_node_id */
    public const check_suite_node_id = 'check_suite_node_id';
    #[Describe(['nullable' => true])]
    public ?string $check_suite_node_id = null;

    /** @see $head_branch */
    public const head_branch = 'head_branch';
    #[Describe(['nullable' => true])]
    public ?string $head_branch = null;

    /** @see $head_sha */
    public const head_sha = 'head_sha';
    #[Describe(['nullable' => true])]
    public ?string $head_sha = null;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $run_number */
    public const run_number = 'run_number';
    #[Describe(['nullable' => true])]
    public ?int $run_number = null;

    /** @see $run_attempt */
    public const run_attempt = 'run_attempt';
    #[Describe(['nullable' => true])]
    public ?int $run_attempt = null;

    /** @see $referenced_workflows */
    public const referenced_workflows = 'referenced_workflows';
    /** @var array<int, ReferencedWorkflow> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ReferencedWorkflow::class,
        'default' => [],
    ])]
    public array $referenced_workflows;

    /** @see $event */
    public const event = 'event';
    #[Describe(['nullable' => true])]
    public ?string $event = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?string $status = null;

    /** @see $conclusion */
    public const conclusion = 'conclusion';
    #[Describe(['nullable' => true])]
    public ?string $conclusion = null;

    /** @see $workflow_id */
    public const workflow_id = 'workflow_id';
    #[Describe(['nullable' => true])]
    public ?int $workflow_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $pull_requests */
    public const pull_requests = 'pull_requests';
    /** @var array<int, PullRequestMinimal> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => PullRequestMinimal::class,
        'default' => [],
    ])]
    public array $pull_requests;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $actor */
    public const actor = 'actor';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $actor = null;

    /** @see $triggering_actor */
    public const triggering_actor = 'triggering_actor';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $triggering_actor = null;

    /** @see $run_started_at */
    public const run_started_at = 'run_started_at';
    #[Describe(['nullable' => true])]
    public ?string $run_started_at = null;

    /** @see $jobs_url */
    public const jobs_url = 'jobs_url';
    #[Describe(['nullable' => true])]
    public ?string $jobs_url = null;

    /** @see $logs_url */
    public const logs_url = 'logs_url';
    #[Describe(['nullable' => true])]
    public ?string $logs_url = null;

    /** @see $check_suite_url */
    public const check_suite_url = 'check_suite_url';
    #[Describe(['nullable' => true])]
    public ?string $check_suite_url = null;

    /** @see $artifacts_url */
    public const artifacts_url = 'artifacts_url';
    #[Describe(['nullable' => true])]
    public ?string $artifacts_url = null;

    /** @see $cancel_url */
    public const cancel_url = 'cancel_url';
    #[Describe(['nullable' => true])]
    public ?string $cancel_url = null;

    /** @see $rerun_url */
    public const rerun_url = 'rerun_url';
    #[Describe(['nullable' => true])]
    public ?string $rerun_url = null;

    /** @see $previous_attempt_url */
    public const previous_attempt_url = 'previous_attempt_url';
    #[Describe(['nullable' => true])]
    public ?string $previous_attempt_url = null;

    /** @see $workflow_url */
    public const workflow_url = 'workflow_url';
    #[Describe(['nullable' => true])]
    public ?string $workflow_url = null;

    /** @see $head_commit */
    public const head_commit = 'head_commit';
    #[Describe(['nullable' => true])]
    public ?SimpleCommit $head_commit = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?MinimalRepository $repository = null;

    /** @see $head_repository */
    public const head_repository = 'head_repository';
    #[Describe(['nullable' => true])]
    public ?MinimalRepository $head_repository = null;

    /** @see $head_repository_id */
    public const head_repository_id = 'head_repository_id';
    #[Describe(['nullable' => true])]
    public ?int $head_repository_id = null;

    /** @see $display_title */
    public const display_title = 'display_title';
    #[Describe(['nullable' => true])]
    public ?string $display_title = null;
}
