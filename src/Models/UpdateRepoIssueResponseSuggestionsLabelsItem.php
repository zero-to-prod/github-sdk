<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoIssueResponseSuggestionsLabelsItem
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

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
