<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoHookRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $config */
    public const config = 'config';
    #[Describe(['nullable' => true])]
    public ?CreateRepoHookRequestConfig $config = null;

    /** @see $events */
    public const events = 'events';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $events;

    /** @see $active */
    public const active = 'active';
    #[Describe(['nullable' => true])]
    public ?bool $active = null;
}
