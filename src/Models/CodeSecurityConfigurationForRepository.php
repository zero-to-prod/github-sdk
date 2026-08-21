<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Code security configuration associated with a repository and attachment
 * status
 * @link https://docs.github.com/
 */
class CodeSecurityConfigurationForRepository
{
    use DataModel;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationRepositoriesStatus $status = null;

    /** @see $configuration */
    public const configuration = 'configuration';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfiguration $configuration = null;
}
