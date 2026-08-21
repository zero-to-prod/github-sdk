<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoCollaboratorRequest
{
    use DataModel;

    /** @see $permission */
    public const permission = 'permission';
    #[Describe(['nullable' => true])]
    public ?string $permission = null;
}
