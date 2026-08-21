<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * An entry in the reviews log for environment deployments
 * @link https://docs.github.com/
 */
class EnvironmentApprovals
{
    use DataModel;

    /** @see $environments */
    public const environments = 'environments';
    /** @var array<int, EnvironmentApprovalsEnvironmentsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => EnvironmentApprovalsEnvironmentsItem::class,
        'default' => [],
    ])]
    public array $environments;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => EnvironmentApprovalsState::unknown])]
    public EnvironmentApprovalsState $state;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;

    /** @see $comment */
    public const comment = 'comment';
    #[Describe(['nullable' => true])]
    public ?string $comment = null;
}
