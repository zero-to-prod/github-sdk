<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateEnterpriseTeamOrganizationAddRequest
{
    use DataModel;

    /** @see $organization_slugs */
    public const organization_slugs = 'organization_slugs';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $organization_slugs;
}
