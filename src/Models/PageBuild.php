<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Page Build
 * @link https://docs.github.com/
 */
class PageBuild
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?string $status = null;

    /** @see $error */
    public const error = 'error';
    #[Describe(['nullable' => true])]
    public ?PageBuildError $error = null;

    /** @see $pusher */
    public const pusher = 'pusher';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $pusher = null;

    /** @see $commit */
    public const commit = 'commit';
    #[Describe(['nullable' => true])]
    public ?string $commit = null;

    /** @see $duration */
    public const duration = 'duration';
    #[Describe(['nullable' => true])]
    public ?int $duration = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
