<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class EnvironmentProtectionRulesItemVariant2
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $prevent_self_review */
    public const prevent_self_review = 'prevent_self_review';
    #[Describe(['nullable' => true])]
    public ?bool $prevent_self_review = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;

    /** @see $reviewers */
    public const reviewers = 'reviewers';
    /** @var array<int, EnvironmentProtectionRulesItemVariant2ReviewersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => EnvironmentProtectionRulesItemVariant2ReviewersItem::class,
        'default' => [],
    ])]
    public array $reviewers;
}
