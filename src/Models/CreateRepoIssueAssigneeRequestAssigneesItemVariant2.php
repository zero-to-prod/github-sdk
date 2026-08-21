<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoIssueAssigneeRequestAssigneesItemVariant2
{
    use DataModel;

    /** @see $login */
    public const login = 'login';
    #[Describe(['nullable' => true])]
    public ?string $login = null;

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
}
