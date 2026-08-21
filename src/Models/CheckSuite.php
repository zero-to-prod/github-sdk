<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A suite of checks performed on the code of a given code change
 * @link https://docs.github.com/
 */
class CheckSuite
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $head_branch */
    public const head_branch = 'head_branch';
    #[Describe(['nullable' => true])]
    public ?string $head_branch = null;

    /** @see $head_sha */
    public const head_sha = 'head_sha';
    #[Describe(['nullable' => true])]
    public ?string $head_sha = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?JobStatus $status = null;

    /** @see $conclusion */
    public const conclusion = 'conclusion';
    #[Describe(['nullable' => true])]
    public ?CheckSuiteConclusion $conclusion = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $before */
    public const before = 'before';
    #[Describe(['nullable' => true])]
    public ?string $before = null;

    /** @see $after */
    public const after = 'after';
    #[Describe(['nullable' => true])]
    public ?string $after = null;

    /** @see $pull_requests */
    public const pull_requests = 'pull_requests';
    /** @var array<int, PullRequestMinimal> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => PullRequestMinimal::class,
        'default' => [],
    ])]
    public array $pull_requests;

    /** @see $app */
    public const app = 'app';
    #[Describe(['nullable' => true])]
    public ?Integration $app = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?MinimalRepository $repository = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $head_commit */
    public const head_commit = 'head_commit';
    #[Describe(['nullable' => true])]
    public ?SimpleCommit $head_commit = null;

    /** @see $latest_check_runs_count */
    public const latest_check_runs_count = 'latest_check_runs_count';
    #[Describe(['nullable' => true])]
    public ?int $latest_check_runs_count = null;

    /** @see $check_runs_url */
    public const check_runs_url = 'check_runs_url';
    #[Describe(['nullable' => true])]
    public ?string $check_runs_url = null;

    /** @see $rerequestable */
    public const rerequestable = 'rerequestable';
    #[Describe(['nullable' => true])]
    public ?bool $rerequestable = null;

    /** @see $runs_rerequestable */
    public const runs_rerequestable = 'runs_rerequestable';
    #[Describe(['nullable' => true])]
    public ?bool $runs_rerequestable = null;
}
