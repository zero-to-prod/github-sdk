<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgCodeSecurityConfigurationDefaultResponse
{
    use DataModel;

    /** @see $default_for_new_repos */
    public const default_for_new_repos = 'default_for_new_repos';
    #[Describe(['nullable' => true])]
    public ?UpdateEnterpriseCodeSecurityConfigurationDefaultResponseDefaultForNewRepos $default_for_new_repos = null;

    /** @see $configuration */
    public const configuration = 'configuration';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfiguration $configuration = null;
}
