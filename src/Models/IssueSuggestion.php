<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * An agent-proposed change to an issue that a maintainer can approve or
 * dismiss.
 * @link https://docs.github.com/
 */
class IssueSuggestion
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $issue_id */
    public const issue_id = 'issue_id';
    #[Describe(['nullable' => true])]
    public ?int $issue_id = null;

    /** @see $action */
    public const action = 'action';
    #[Describe(['default' => IssueSuggestionAction::unknown])]
    public IssueSuggestionAction $action;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => IssueSuggestionState::unknown])]
    public IssueSuggestionState $state;

    /** @see $target_id */
    public const target_id = 'target_id';
    #[Describe(['nullable' => true])]
    public ?int $target_id = null;

    /** @see $target_value */
    public const target_value = 'target_value';
    #[Describe(['nullable' => true])]
    public string|float|bool|array|null $target_value = null;

    /** @see $rationale */
    public const rationale = 'rationale';
    #[Describe(['nullable' => true])]
    public ?string $rationale = null;

    /** @see $confidence */
    public const confidence = 'confidence';
    #[Describe(['nullable' => true])]
    public ?NullableIssueEventIntentConfidence $confidence = null;

    /** @see $actor_id */
    public const actor_id = 'actor_id';
    #[Describe(['nullable' => true])]
    public ?int $actor_id = null;

    /** @see $issue_event_id */
    public const issue_event_id = 'issue_event_id';
    #[Describe(['nullable' => true])]
    public ?int $issue_event_id = null;

    /** @see $resolved_by */
    public const resolved_by = 'resolved_by';
    #[Describe(['nullable' => true])]
    public ?int $resolved_by = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
