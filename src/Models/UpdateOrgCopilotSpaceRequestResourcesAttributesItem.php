<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgCopilotSpaceRequestResourcesAttributesItem
{
    use DataModel;

    /** @see $resource_type */
    public const resource_type = 'resource_type';
    #[Describe(['nullable' => true])]
    public ?CopilotSpaceResourcesAttributesItemResourceType $resource_type = null;

    /** @see $metadata */
    public const metadata = 'metadata';
    #[Describe(['nullable' => true])]
    public ?UpdateOrgCopilotSpaceRequestResourcesAttributesItemMetadata $metadata = null;
}
