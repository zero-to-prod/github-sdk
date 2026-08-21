<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Information of a job execution in a workflow run
 * @link https://docs.github.com/
 */
class Job
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $run_id */
    public const run_id = 'run_id';
    #[Describe(['nullable' => true])]
    public ?int $run_id = null;

    /** @see $run_url */
    public const run_url = 'run_url';
    #[Describe(['nullable' => true])]
    public ?string $run_url = null;

    /** @see $run_attempt */
    public const run_attempt = 'run_attempt';
    #[Describe(['nullable' => true])]
    public ?int $run_attempt = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $head_sha */
    public const head_sha = 'head_sha';
    #[Describe(['nullable' => true])]
    public ?string $head_sha = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => JobStatus::unknown])]
    public JobStatus $status;

    /** @see $conclusion */
    public const conclusion = 'conclusion';
    #[Describe(['nullable' => true])]
    public ?JobConclusion $conclusion = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $started_at */
    public const started_at = 'started_at';
    #[Describe(['nullable' => true])]
    public ?string $started_at = null;

    /** @see $completed_at */
    public const completed_at = 'completed_at';
    #[Describe(['nullable' => true])]
    public ?string $completed_at = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $steps */
    public const steps = 'steps';
    /** @var array<int, JobStepsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => JobStepsItem::class,
        'default' => [],
    ])]
    public array $steps;

    /** @see $check_run_url */
    public const check_run_url = 'check_run_url';
    #[Describe(['nullable' => true])]
    public ?string $check_run_url = null;

    /** @see $labels */
    public const labels = 'labels';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $labels;

    /** @see $runner_id */
    public const runner_id = 'runner_id';
    #[Describe(['nullable' => true])]
    public ?int $runner_id = null;

    /** @see $runner_name */
    public const runner_name = 'runner_name';
    #[Describe(['nullable' => true])]
    public ?string $runner_name = null;

    /** @see $runner_group_id */
    public const runner_group_id = 'runner_group_id';
    #[Describe(['nullable' => true])]
    public ?int $runner_group_id = null;

    /** @see $runner_group_name */
    public const runner_group_name = 'runner_group_name';
    #[Describe(['nullable' => true])]
    public ?string $runner_group_name = null;

    /** @see $workflow_name */
    public const workflow_name = 'workflow_name';
    #[Describe(['nullable' => true])]
    public ?string $workflow_name = null;

    /** @see $head_branch */
    public const head_branch = 'head_branch';
    #[Describe(['nullable' => true])]
    public ?string $head_branch = null;
}
