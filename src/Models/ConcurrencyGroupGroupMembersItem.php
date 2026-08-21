<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ConcurrencyGroupGroupMembersItem
{
    use DataModel;

    /** @see $run_id */
    public const run_id = 'run_id';
    #[Describe(['nullable' => true])]
    public ?int $run_id = null;

    /** @see $run_name */
    public const run_name = 'run_name';
    #[Describe(['nullable' => true])]
    public ?string $run_name = null;

    /** @see $run_url */
    public const run_url = 'run_url';
    #[Describe(['nullable' => true])]
    public ?string $run_url = null;

    /** @see $run_html_url */
    public const run_html_url = 'run_html_url';
    #[Describe(['nullable' => true])]
    public ?string $run_html_url = null;

    /** @see $job_id */
    public const job_id = 'job_id';
    #[Describe(['nullable' => true])]
    public ?int $job_id = null;

    /** @see $job_name */
    public const job_name = 'job_name';
    #[Describe(['nullable' => true])]
    public ?string $job_name = null;

    /** @see $job_url */
    public const job_url = 'job_url';
    #[Describe(['nullable' => true])]
    public ?string $job_url = null;

    /** @see $job_html_url */
    public const job_html_url = 'job_html_url';
    #[Describe(['nullable' => true])]
    public ?string $job_html_url = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => ConcurrencyGroupGroupMembersItemStatus::unknown])]
    public ConcurrencyGroupGroupMembersItemStatus $status;
}
