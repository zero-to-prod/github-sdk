<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateEnterpriseCodeSecurityConfigurationAttachRequest
{
    use DataModel;

    /** @see $scope */
    public const scope = 'scope';
    #[Describe(['default' => CreateEnterpriseCodeSecurityConfigurationAttachRequestScope::unknown])]
    public CreateEnterpriseCodeSecurityConfigurationAttachRequestScope $scope;
}
