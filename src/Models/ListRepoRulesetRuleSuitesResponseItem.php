<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoRulesetRuleSuitesResponseItem
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $actor_id */
    public const actor_id = 'actor_id';
    #[Describe(['nullable' => true])]
    public ?int $actor_id = null;

    /** @see $actor_name */
    public const actor_name = 'actor_name';
    #[Describe(['nullable' => true])]
    public ?string $actor_name = null;

    /** @see $before_sha */
    public const before_sha = 'before_sha';
    #[Describe(['nullable' => true])]
    public ?string $before_sha = null;

    /** @see $after_sha */
    public const after_sha = 'after_sha';
    #[Describe(['nullable' => true])]
    public ?string $after_sha = null;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;

    /** @see $repository_id */
    public const repository_id = 'repository_id';
    #[Describe(['nullable' => true])]
    public ?int $repository_id = null;

    /** @see $repository_name */
    public const repository_name = 'repository_name';
    #[Describe(['nullable' => true])]
    public ?string $repository_name = null;

    /** @see $pushed_at */
    public const pushed_at = 'pushed_at';
    #[Describe(['nullable' => true])]
    public ?string $pushed_at = null;

    /** @see $result */
    public const result = 'result';
    #[Describe(['nullable' => true])]
    public ?RuleSuitesItemResult $result = null;

    /** @see $evaluation_result */
    public const evaluation_result = 'evaluation_result';
    #[Describe(['nullable' => true])]
    public ?RuleSuitesItemResult $evaluation_result = null;
}
