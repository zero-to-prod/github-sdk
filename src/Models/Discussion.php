<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A Discussion in a repository.
 * @link https://docs.github.com/
 */
class Discussion
{
    use DataModel;

    /** @see $active_lock_reason */
    public const active_lock_reason = 'active_lock_reason';
    #[Describe(['nullable' => true])]
    public ?string $active_lock_reason = null;

    /** @see $answer_chosen_at */
    public const answer_chosen_at = 'answer_chosen_at';
    #[Describe(['nullable' => true])]
    public ?string $answer_chosen_at = null;

    /** @see $answer_chosen_by */
    public const answer_chosen_by = 'answer_chosen_by';
    #[Describe(['nullable' => true])]
    public ?DiscussionAnswerChosenBy $answer_chosen_by = null;

    /** @see $answer_html_url */
    public const answer_html_url = 'answer_html_url';
    #[Describe(['nullable' => true])]
    public ?string $answer_html_url = null;

    /** @see $author_association */
    public const author_association = 'author_association';
    #[Describe(['nullable' => true])]
    public ?DiscussionAuthorAssociation $author_association = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $category */
    public const category = 'category';
    #[Describe(['nullable' => true])]
    public ?DiscussionCategory $category = null;

    /** @see $comments */
    public const comments = 'comments';
    #[Describe(['nullable' => true])]
    public ?int $comments = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $locked */
    public const locked = 'locked';
    #[Describe(['nullable' => true])]
    public ?bool $locked = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $reactions */
    public const reactions = 'reactions';
    #[Describe(['nullable' => true])]
    public ?DiscussionReactions $reactions = null;

    /** @see $repository_url */
    public const repository_url = 'repository_url';
    #[Describe(['nullable' => true])]
    public ?string $repository_url = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => DiscussionState::unknown])]
    public DiscussionState $state;

    /** @see $state_reason */
    public const state_reason = 'state_reason';
    #[Describe(['nullable' => true])]
    public ?DiscussionStateReason $state_reason = null;

    /** @see $timeline_url */
    public const timeline_url = 'timeline_url';
    #[Describe(['nullable' => true])]
    public ?string $timeline_url = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?DiscussionUser $user = null;

    /** @see $labels */
    public const labels = 'labels';
    /** @var array<int, Label> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Label::class,
        'default' => [],
    ])]
    public array $labels;
}
