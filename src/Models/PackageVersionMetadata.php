<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PackageVersionMetadata
{
    use DataModel;

    /** @see $package_type */
    public const package_type = 'package_type';
    #[Describe(['default' => PackagePackageType::unknown])]
    public PackagePackageType $package_type;

    /** @see $container */
    public const container = 'container';
    #[Describe(['nullable' => true])]
    public ?PackageVersionMetadataContainer $container = null;

    /** @see $docker */
    public const docker = 'docker';
    #[Describe(['nullable' => true])]
    public ?PackageVersionMetadataDocker $docker = null;
}
