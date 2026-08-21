<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DeleteRepoIssueAssigneeRequest
{
    use DataModel;

    /** @see $assignees */
    public const assignees = 'assignees';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $assignees;
}
