<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoHookRequest
{
    use DataModel;

    /** @see $config */
    public const config = 'config';
    #[Describe(['nullable' => true])]
    public ?WebhookConfig $config = null;

    /** @see $events */
    public const events = 'events';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $events;

    /** @see $add_events */
    public const add_events = 'add_events';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $add_events;

    /** @see $remove_events */
    public const remove_events = 'remove_events';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $remove_events;

    /** @see $active */
    public const active = 'active';
    #[Describe(['nullable' => true])]
    public ?bool $active = null;
}
