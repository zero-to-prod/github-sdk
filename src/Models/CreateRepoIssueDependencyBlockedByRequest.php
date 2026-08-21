<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoIssueDependencyBlockedByRequest
{
    use DataModel;

    /** @see $issue_id */
    public const issue_id = 'issue_id';
    #[Describe(['nullable' => true])]
    public ?int $issue_id = null;
}
