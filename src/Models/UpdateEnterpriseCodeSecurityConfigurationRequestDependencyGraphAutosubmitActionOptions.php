<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Feature options for Automatic dependency submission
 * @link https://docs.github.com/
 */
class UpdateEnterpriseCodeSecurityConfigurationRequestDependencyGraphAutosubmitActionOptions
{
    use DataModel;

    /** @see $labeled_runners */
    public const labeled_runners = 'labeled_runners';
    #[Describe(['nullable' => true])]
    public ?bool $labeled_runners = null;
}
