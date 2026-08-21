<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoCheckSuiteRequest
{
    use DataModel;

    /** @see $head_sha */
    public const head_sha = 'head_sha';
    #[Describe(['nullable' => true])]
    public ?string $head_sha = null;
}
