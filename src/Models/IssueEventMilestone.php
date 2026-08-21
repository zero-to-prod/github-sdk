<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Issue Event Milestone
 * @link https://docs.github.com/
 */
class IssueEventMilestone
{
    use DataModel;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;
}
