<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoIssueSubIssueRequest
{
    use DataModel;

    /** @see $sub_issue_id */
    public const sub_issue_id = 'sub_issue_id';
    #[Describe(['nullable' => true])]
    public ?int $sub_issue_id = null;

    /** @see $replace_parent */
    public const replace_parent = 'replace_parent';
    #[Describe(['nullable' => true])]
    public ?bool $replace_parent = null;
}
