<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A minimal reference to an issue linked from a timeline event (e.g.
 * sub-issue, parent-issue, or dependency events).
 * @link https://docs.github.com/
 */
class NullableIssueReference
{
    use DataModel;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?string $state = null;

    /** @see $state_reason */
    public const state_reason = 'state_reason';
    #[Describe(['nullable' => true])]
    public ?string $state_reason = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?SimpleRepository $repository = null;

    /** @see $issue_type */
    public const issue_type = 'issue_type';
    #[Describe(['nullable' => true])]
    public ?NullableIssueReferenceIssueType $issue_type = null;
}
