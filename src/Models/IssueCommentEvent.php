<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class IssueCommentEvent
{
    use DataModel;

    /** @see $action */
    public const action = 'action';
    #[Describe(['nullable' => true])]
    public ?string $action = null;

    /** @see $issue */
    public const issue = 'issue';
    #[Describe(['nullable' => true])]
    public ?Issue $issue = null;

    /** @see $comment */
    public const comment = 'comment';
    #[Describe(['nullable' => true])]
    public ?IssueComment $comment = null;
}
