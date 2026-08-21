<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Activity
 * @link https://docs.github.com/
 */
class Activity
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

    /** @see $before */
    public const before = 'before';
    #[Describe(['nullable' => true])]
    public ?string $before = null;

    /** @see $after */
    public const after = 'after';
    #[Describe(['nullable' => true])]
    public ?string $after = null;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;

    /** @see $timestamp */
    public const timestamp = 'timestamp';
    #[Describe(['nullable' => true])]
    public ?string $timestamp = null;

    /** @see $activity_type */
    public const activity_type = 'activity_type';
    #[Describe(['default' => ActivityActivityType::unknown])]
    public ActivityActivityType $activity_type;

    /** @see $actor */
    public const actor = 'actor';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $actor = null;
}
