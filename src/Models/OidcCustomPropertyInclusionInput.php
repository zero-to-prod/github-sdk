<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Input for creating an OIDC custom property inclusion
 * @link https://docs.github.com/
 */
class OidcCustomPropertyInclusionInput
{
    use DataModel;

    /** @see $custom_property_name */
    public const custom_property_name = 'custom_property_name';
    #[Describe(['nullable' => true])]
    public ?string $custom_property_name = null;
}
