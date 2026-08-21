<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Gist History
 * @link https://docs.github.com/
 */
class GistHistory
{
    use DataModel;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;

    /** @see $version */
    public const version = 'version';
    #[Describe(['nullable' => true])]
    public ?string $version = null;

    /** @see $committed_at */
    public const committed_at = 'committed_at';
    #[Describe(['nullable' => true])]
    public ?string $committed_at = null;

    /** @see $change_status */
    public const change_status = 'change_status';
    #[Describe(['nullable' => true])]
    public ?GistHistoryChangeStatus $change_status = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;
}
