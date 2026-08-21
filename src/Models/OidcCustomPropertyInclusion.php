<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * An OIDC custom property inclusion for repository properties
 * @link https://docs.github.com/
 */
class OidcCustomPropertyInclusion
{
    use DataModel;

    /** @see $custom_property_name */
    public const custom_property_name = 'custom_property_name';
    #[Describe(['nullable' => true])]
    public ?string $custom_property_name = null;

    /** @see $inclusion_source */
    public const inclusion_source = 'inclusion_source';
    #[Describe(['default' => OidcCustomPropertyInclusionInclusionSource::unknown])]
    public OidcCustomPropertyInclusionInclusionSource $inclusion_source;
}
