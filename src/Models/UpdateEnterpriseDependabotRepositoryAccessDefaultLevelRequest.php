<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateEnterpriseDependabotRepositoryAccessDefaultLevelRequest
{
    use DataModel;

    /** @see $default_level */
    public const default_level = 'default_level';
    #[Describe(['default' => DependabotRepositoryAccessDetailsDefaultLevel::unknown])]
    public DependabotRepositoryAccessDetailsDefaultLevel $default_level;
}
