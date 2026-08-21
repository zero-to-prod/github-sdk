<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Social media account
 * @link https://docs.github.com/
 */
class SocialAccount
{
    use DataModel;

    /** @see $provider */
    public const provider = 'provider';
    #[Describe(['nullable' => true])]
    public ?string $provider = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;
}
