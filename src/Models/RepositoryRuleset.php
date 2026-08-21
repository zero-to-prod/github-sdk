<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A set of rules to apply when specified conditions are met.
 * @link https://docs.github.com/
 */
class RepositoryRuleset
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $target */
    public const target = 'target';
    #[Describe(['nullable' => true])]
    public ?RepositoryRulesetTarget $target = null;

    /** @see $source_type */
    public const source_type = 'source_type';
    #[Describe(['nullable' => true])]
    public ?RepositoryRulesetSourceType $source_type = null;

    /** @see $source */
    public const source = 'source';
    #[Describe(['nullable' => true])]
    public ?string $source = null;

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

    /** @see $current_user_can_bypass */
    public const current_user_can_bypass = 'current_user_can_bypass';
    #[Describe(['nullable' => true])]
    public ?RepositoryRulesetCurrentUserCanBypass $current_user_can_bypass = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $links */
    public const links = '_links';
    #[Describe([
        'from' => self::links,
        'nullable' => true,
    ])]
    public ?RepositoryRulesetLinks $links = null;

    /** @see $conditions */
    public const conditions = 'conditions';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $conditions;

    /** @see $rules */
    public const rules = 'rules';
    /** @var array<int, array<string, mixed>> */
    #[Describe(['default' => []])]
    public array $rules;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
