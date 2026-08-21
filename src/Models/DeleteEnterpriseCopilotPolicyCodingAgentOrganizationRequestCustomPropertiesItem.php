<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DeleteEnterpriseCopilotPolicyCodingAgentOrganizationRequestCustomPropertiesItem
{
    use DataModel;

    /** @see $property_name */
    public const property_name = 'property_name';
    #[Describe(['nullable' => true])]
    public ?string $property_name = null;

    /** @see $values */
    public const values = 'values';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $values;
}
