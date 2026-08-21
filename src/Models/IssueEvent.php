<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Issue Event
 * @link https://docs.github.com/
 */
class IssueEvent
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $actor */
    public const actor = 'actor';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $actor = null;

    /** @see $event */
    public const event = 'event';
    #[Describe(['nullable' => true])]
    public ?string $event = null;

    /** @see $commit_id */
    public const commit_id = 'commit_id';
    #[Describe(['nullable' => true])]
    public ?string $commit_id = null;

    /** @see $commit_url */
    public const commit_url = 'commit_url';
    #[Describe(['nullable' => true])]
    public ?string $commit_url = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $issue */
    public const issue = 'issue';
    #[Describe(['nullable' => true])]
    public ?Issue $issue = null;

    /** @see $label */
    public const label = 'label';
    #[Describe(['nullable' => true])]
    public ?IssueEventLabel $label = null;

    /** @see $assignee */
    public const assignee = 'assignee';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $assignee = null;

    /** @see $assigner */
    public const assigner = 'assigner';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $assigner = null;

    /** @see $review_requester */
    public const review_requester = 'review_requester';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $review_requester = null;

    /** @see $requested_reviewer */
    public const requested_reviewer = 'requested_reviewer';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $requested_reviewer = null;

    /** @see $requested_team */
    public const requested_team = 'requested_team';
    #[Describe(['nullable' => true])]
    public ?Team $requested_team = null;

    /** @see $dismissed_review */
    public const dismissed_review = 'dismissed_review';
    #[Describe(['nullable' => true])]
    public ?IssueEventDismissedReview $dismissed_review = null;

    /** @see $milestone */
    public const milestone = 'milestone';
    #[Describe(['nullable' => true])]
    public ?IssueEventMilestone $milestone = null;

    /** @see $project_card */
    public const project_card = 'project_card';
    #[Describe(['nullable' => true])]
    public ?IssueEventProjectCard $project_card = null;

    /** @see $rename */
    public const rename = 'rename';
    #[Describe(['nullable' => true])]
    public ?IssueEventRename $rename = null;

    /** @see $issue_type */
    public const issue_type = 'issue_type';
    #[Describe(['nullable' => true])]
    public ?IssueTypeWebhook $issue_type = null;

    /** @see $prev_issue_type */
    public const prev_issue_type = 'prev_issue_type';
    #[Describe(['nullable' => true])]
    public ?IssueTypeWebhook $prev_issue_type = null;

    /** @see $sub_issue */
    public const sub_issue = 'sub_issue';
    #[Describe(['nullable' => true])]
    public ?NullableIssueReference $sub_issue = null;

    /** @see $parent_issue */
    public const parent_issue = 'parent_issue';
    #[Describe(['nullable' => true])]
    public ?NullableIssueReference $parent_issue = null;

    /** @see $blocked_by */
    public const blocked_by = 'blocked_by';
    #[Describe(['nullable' => true])]
    public ?NullableIssueReference $blocked_by = null;

    /** @see $blocking */
    public const blocking = 'blocking';
    #[Describe(['nullable' => true])]
    public ?NullableIssueReference $blocking = null;

    /** @see $intent */
    public const intent = 'intent';
    #[Describe(['nullable' => true])]
    public ?NullableIssueEventIntent $intent = null;

    /** @see $author_association */
    public const author_association = 'author_association';
    #[Describe(['nullable' => true])]
    public ?AuthorAssociation $author_association = null;

    /** @see $lock_reason */
    public const lock_reason = 'lock_reason';
    #[Describe(['nullable' => true])]
    public ?string $lock_reason = null;

    /** @see $performed_via_github_app */
    public const performed_via_github_app = 'performed_via_github_app';
    #[Describe(['nullable' => true])]
    public ?Integration $performed_via_github_app = null;
}
