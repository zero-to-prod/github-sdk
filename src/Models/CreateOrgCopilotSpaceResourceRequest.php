<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgCopilotSpaceResourceRequest
{
    use DataModel;

    /** @see $resource_type */
    public const resource_type = 'resource_type';
    #[Describe(['default' => CreateOrgCopilotSpaceResourceRequestResourceType::unknown])]
    public CreateOrgCopilotSpaceResourceRequestResourceType $resource_type;

    /** @see $metadata */
    public const metadata = 'metadata';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $metadata;
}
