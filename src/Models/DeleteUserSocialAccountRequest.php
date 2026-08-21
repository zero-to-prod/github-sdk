<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DeleteUserSocialAccountRequest
{
    use DataModel;

    /** @see $account_urls */
    public const account_urls = 'account_urls';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $account_urls;
}
