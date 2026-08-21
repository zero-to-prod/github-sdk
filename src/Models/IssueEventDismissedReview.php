<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class IssueEventDismissedReview
{
    use DataModel;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?string $state = null;

    /** @see $review_id */
    public const review_id = 'review_id';
    #[Describe(['nullable' => true])]
    public ?int $review_id = null;

    /** @see $dismissal_message */
    public const dismissal_message = 'dismissal_message';
    #[Describe(['nullable' => true])]
    public ?string $dismissal_message = null;

    /** @see $dismissal_commit_id */
    public const dismissal_commit_id = 'dismissal_commit_id';
    #[Describe(['nullable' => true])]
    public ?string $dismissal_commit_id = null;
}
