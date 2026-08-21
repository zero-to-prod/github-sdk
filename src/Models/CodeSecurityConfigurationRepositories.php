<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Repositories associated with a code security configuration and attachment
 * status
 * @link https://docs.github.com/
 */
class CodeSecurityConfigurationRepositories
{
    use DataModel;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationRepositoriesStatus $status = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?SimpleRepository $repository = null;
}
