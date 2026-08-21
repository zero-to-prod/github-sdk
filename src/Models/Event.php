<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Event
 * @link https://docs.github.com/
 */
class Event
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;

    /** @see $actor */
    public const actor = 'actor';
    #[Describe(['nullable' => true])]
    public ?Actor $actor = null;

    /** @see $repo */
    public const repo = 'repo';
    #[Describe(['nullable' => true])]
    public ?EventRepo $repo = null;

    /** @see $org */
    public const org = 'org';
    #[Describe(['nullable' => true])]
    public ?Actor $org = null;

    /** @see $payload */
    public const payload = 'payload';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $payload;

    /** @see $public */
    public const public = 'public';
    #[Describe(['nullable' => true])]
    public ?bool $public = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;
}
