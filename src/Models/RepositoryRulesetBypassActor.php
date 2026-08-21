<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * An actor that can bypass rules in a ruleset
 * @link https://docs.github.com/
 */
class RepositoryRulesetBypassActor
{
    use DataModel;

    /** @see $actor_id */
    public const actor_id = 'actor_id';
    #[Describe(['nullable' => true])]
    public ?int $actor_id = null;

    /** @see $actor_type */
    public const actor_type = 'actor_type';
    #[Describe(['default' => RepositoryRulesetBypassActorActorType::unknown])]
    public RepositoryRulesetBypassActorActorType $actor_type;

    /** @see $bypass_mode */
    public const bypass_mode = 'bypass_mode';
    #[Describe(['nullable' => true])]
    public ?RepositoryRulesetBypassActorBypassMode $bypass_mode = null;
}
