<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Provides details of Public IP for a GitHub-hosted larger runners
 * @link https://docs.github.com/
 */
class PublicIp
{
    use DataModel;

    /** @see $enabled */
    public const enabled = 'enabled';
    #[Describe(['nullable' => true])]
    public ?bool $enabled = null;

    /** @see $prefix */
    public const prefix = 'prefix';
    #[Describe(['nullable' => true])]
    public ?string $prefix = null;

    /** @see $length */
    public const length = 'length';
    #[Describe(['nullable' => true])]
    public ?int $length = null;
}
