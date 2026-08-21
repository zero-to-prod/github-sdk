<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoStackAddRequest
{
    use DataModel;

    /** @see $pull_requests */
    public const pull_requests = 'pull_requests';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $pull_requests;
}
