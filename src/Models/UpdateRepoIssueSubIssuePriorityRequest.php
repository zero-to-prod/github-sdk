<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoIssueSubIssuePriorityRequest
{
    use DataModel;

    /** @see $sub_issue_id */
    public const sub_issue_id = 'sub_issue_id';
    #[Describe(['nullable' => true])]
    public ?int $sub_issue_id = null;

    /** @see $after_id */
    public const after_id = 'after_id';
    #[Describe(['nullable' => true])]
    public ?int $after_id = null;

    /** @see $before_id */
    public const before_id = 'before_id';
    #[Describe(['nullable' => true])]
    public ?int $before_id = null;
}
