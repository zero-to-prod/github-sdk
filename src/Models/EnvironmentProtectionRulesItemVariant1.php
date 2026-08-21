<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class EnvironmentProtectionRulesItemVariant1
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

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;

    /** @see $wait_timer */
    public const wait_timer = 'wait_timer';
    #[Describe(['nullable' => true])]
    public ?int $wait_timer = null;
}
