<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class RepositoryAdvisoryCreateVulnerabilitiesItem
{
    use DataModel;

    /** @see $package */
    public const package = 'package';
    #[Describe(['nullable' => true])]
    public ?RepositoryAdvisoryCreateVulnerabilitiesItemPackage $package = null;

    /** @see $vulnerable_version_range */
    public const vulnerable_version_range = 'vulnerable_version_range';
    #[Describe(['nullable' => true])]
    public ?string $vulnerable_version_range = null;

    /** @see $patched_versions */
    public const patched_versions = 'patched_versions';
    #[Describe(['nullable' => true])]
    public ?string $patched_versions = null;

    /** @see $vulnerable_functions */
    public const vulnerable_functions = 'vulnerable_functions';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $vulnerable_functions;
}
