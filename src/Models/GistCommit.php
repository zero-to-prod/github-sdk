<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Gist Commit
 * @link https://docs.github.com/
 */
class GistCommit
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $version */
    public const version = 'version';
    #[Describe(['nullable' => true])]
    public ?string $version = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;

    /** @see $change_status */
    public const change_status = 'change_status';
    #[Describe(['nullable' => true])]
    public ?GistCommitChangeStatus $change_status = null;

    /** @see $committed_at */
    public const committed_at = 'committed_at';
    #[Describe(['nullable' => true])]
    public ?string $committed_at = null;
}
