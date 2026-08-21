<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoBranchRenameRequest
{
    use DataModel;

    /** @see $new_name */
    public const new_name = 'new_name';
    #[Describe(['nullable' => true])]
    public ?string $new_name = null;
}
