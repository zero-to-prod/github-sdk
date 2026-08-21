<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The status of a commit.
 * @link https://docs.github.com/
 */
class Status
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $avatar_url */
    public const avatar_url = 'avatar_url';
    #[Describe(['nullable' => true])]
    public ?string $avatar_url = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?string $state = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $target_url */
    public const target_url = 'target_url';
    #[Describe(['nullable' => true])]
    public ?string $target_url = null;

    /** @see $context */
    public const context = 'context';
    #[Describe(['nullable' => true])]
    public ?string $context = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $creator */
    public const creator = 'creator';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $creator = null;
}
