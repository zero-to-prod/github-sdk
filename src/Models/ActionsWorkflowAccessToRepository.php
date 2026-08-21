<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ActionsWorkflowAccessToRepository
{
    use DataModel;

    /** @see $access_level */
    public const access_level = 'access_level';
    #[Describe(['default' => ActionsWorkflowAccessToRepositoryAccessLevel::unknown])]
    public ActionsWorkflowAccessToRepositoryAccessLevel $access_level;
}
