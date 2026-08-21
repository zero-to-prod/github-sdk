<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgOutsideCollaboratorRequest
{
    use DataModel;

    /** @see $async */
    public const async = 'async';
    #[Describe(['nullable' => true])]
    public ?bool $async = null;
}
