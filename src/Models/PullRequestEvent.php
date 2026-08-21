<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PullRequestEvent
{
    use DataModel;

    /** @see $action */
    public const action = 'action';
    #[Describe(['nullable' => true])]
    public ?string $action = null;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $pull_request */
    public const pull_request = 'pull_request';
    #[Describe(['nullable' => true])]
    public ?PullRequestMinimal $pull_request = null;

    /** @see $assignee */
    public const assignee = 'assignee';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $assignee = null;

    /** @see $assignees */
    public const assignees = 'assignees';
    /** @var array<int, SimpleUser> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SimpleUser::class,
        'default' => [],
    ])]
    public array $assignees;

    /** @see $label */
    public const label = 'label';
    #[Describe(['nullable' => true])]
    public ?Label $label = null;

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
