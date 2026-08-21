<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DeleteRepoPullRequestedReviewerRequest
{
    use DataModel;

    /** @see $reviewers */
    public const reviewers = 'reviewers';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $reviewers;

    /** @see $team_reviewers */
    public const team_reviewers = 'team_reviewers';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $team_reviewers;
}
