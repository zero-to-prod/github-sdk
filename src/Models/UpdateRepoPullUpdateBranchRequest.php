<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoPullUpdateBranchRequest
{
    use DataModel;

    /** @see $expected_head_sha */
    public const expected_head_sha = 'expected_head_sha';
    #[Describe(['nullable' => true])]
    public ?string $expected_head_sha = null;
}
