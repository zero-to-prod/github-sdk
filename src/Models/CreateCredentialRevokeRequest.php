<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateCredentialRevokeRequest
{
    use DataModel;

    /** @see $credentials */
    public const credentials = 'credentials';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $credentials;
}
