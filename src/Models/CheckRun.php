<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A check performed on the code of a given code change
 * @link https://docs.github.com/
 */
class CheckRun
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $head_sha */
    public const head_sha = 'head_sha';
    #[Describe(['nullable' => true])]
    public ?string $head_sha = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $external_id */
    public const external_id = 'external_id';
    #[Describe(['nullable' => true])]
    public ?string $external_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $details_url */
    public const details_url = 'details_url';
    #[Describe(['nullable' => true])]
    public ?string $details_url = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => JobStatus::unknown])]
    public JobStatus $status;

    /** @see $conclusion */
    public const conclusion = 'conclusion';
    #[Describe(['nullable' => true])]
    public ?JobConclusion $conclusion = null;

    /** @see $started_at */
    public const started_at = 'started_at';
    #[Describe(['nullable' => true])]
    public ?string $started_at = null;

    /** @see $completed_at */
    public const completed_at = 'completed_at';
    #[Describe(['nullable' => true])]
    public ?string $completed_at = null;

    /** @see $output */
    public const output = 'output';
    #[Describe(['nullable' => true])]
    public ?CheckRunOutput $output = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $check_suite */
    public const check_suite = 'check_suite';
    #[Describe(['nullable' => true])]
    public ?CheckRunCheckSuite $check_suite = null;

    /** @see $app */
    public const app = 'app';
    #[Describe(['nullable' => true])]
    public ?Integration $app = null;

    /** @see $pull_requests */
    public const pull_requests = 'pull_requests';
    /** @var array<int, PullRequestMinimal> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => PullRequestMinimal::class,
        'default' => [],
    ])]
    public array $pull_requests;

    /** @see $deployment */
    public const deployment = 'deployment';
    #[Describe(['nullable' => true])]
    public ?DeploymentSimple $deployment = null;
}
