<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DeleteEnterpriseCopilotPolicyCodingAgentOrganizationRequest
{
    use DataModel;

    /** @see $organizations */
    public const organizations = 'organizations';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $organizations;

    /** @see $custom_properties */
    public const custom_properties = 'custom_properties';
    /** @var array<int, DeleteEnterpriseCopilotPolicyCodingAgentOrganizationRequestCustomPropertiesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => DeleteEnterpriseCopilotPolicyCodingAgentOrganizationRequestCustomPropertiesItem::class,
        'default' => [],
    ])]
    public array $custom_properties;
}
