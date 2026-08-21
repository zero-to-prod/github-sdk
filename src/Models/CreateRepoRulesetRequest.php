<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoRulesetRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $target */
    public const target = 'target';
    #[Describe(['nullable' => true])]
    public ?CreateRepoRulesetRequestTarget $target = null;

    /** @see $enforcement */
    public const enforcement = 'enforcement';
    #[Describe(['default' => RepositoryRuleEnforcement::unknown])]
    public RepositoryRuleEnforcement $enforcement;

    /** @see $bypass_actors */
    public const bypass_actors = 'bypass_actors';
    /** @var array<int, RepositoryRulesetBypassActor> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => RepositoryRulesetBypassActor::class,
        'default' => [],
    ])]
    public array $bypass_actors;

    /** @see $conditions */
    public const conditions = 'conditions';
    #[Describe(['nullable' => true])]
    public ?RepositoryRulesetConditions $conditions = null;

    /** @see $rules */
    public const rules = 'rules';
    /** @var array<int, array<string, mixed>> */
    #[Describe(['default' => []])]
    public array $rules;
}
