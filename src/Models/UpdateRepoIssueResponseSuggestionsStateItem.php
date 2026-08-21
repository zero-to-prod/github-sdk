<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoIssueResponseSuggestionsStateItem
{
    use DataModel;

    /** @see $value */
    public const value = 'value';
    #[Describe(['nullable' => true])]
    public ?string $value = null;

    /** @see $state_reason */
    public const state_reason = 'state_reason';
    #[Describe(['nullable' => true])]
    public ?string $state_reason = null;

    /** @see $duplicate_issue_id */
    public const duplicate_issue_id = 'duplicate_issue_id';
    #[Describe(['nullable' => true])]
    public ?int $duplicate_issue_id = null;

    /** @see $rationale */
    public const rationale = 'rationale';
    #[Describe(['nullable' => true])]
    public ?string $rationale = null;

    /** @see $suggest */
    public const suggest = 'suggest';
    #[Describe(['nullable' => true])]
    public ?bool $suggest = null;

    /** @see $confidence */
    public const confidence = 'confidence';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoIssueResponseSuggestionsTypeItemConfidence $confidence = null;

    /** @see $ignored */
    public const ignored = 'ignored';
    #[Describe(['nullable' => true])]
    public ?bool $ignored = null;

    /** @see $ignored_reason */
    public const ignored_reason = 'ignored_reason';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoIssueResponseSuggestionsTypeItemIgnoredReason $ignored_reason = null;
}
