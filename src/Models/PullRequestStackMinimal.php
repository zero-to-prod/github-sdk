<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PullRequestStackMinimal
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $base */
    public const base = 'base';
    #[Describe(['nullable' => true])]
    public ?PullRequestStackMinimalBase $base = null;

    /** @see $open */
    public const open = 'open';
    #[Describe(['nullable' => true])]
    public ?bool $open = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $pull_requests */
    public const pull_requests = 'pull_requests';
    /** @var array<int, PullRequestStackMinimalPullRequestsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => PullRequestStackMinimalPullRequestsItem::class,
        'default' => [],
    ])]
    public array $pull_requests;
}
