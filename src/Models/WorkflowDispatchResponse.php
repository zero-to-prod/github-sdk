<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Response containing the workflow run ID and URLs.
 * @link https://docs.github.com/
 */
class WorkflowDispatchResponse
{
    use DataModel;

    /** @see $workflow_run_id */
    public const workflow_run_id = 'workflow_run_id';
    #[Describe(['nullable' => true])]
    public ?int $workflow_run_id = null;

    /** @see $run_url */
    public const run_url = 'run_url';
    #[Describe(['nullable' => true])]
    public ?string $run_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;
}
