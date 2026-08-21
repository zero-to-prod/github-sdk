<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A schema for the SPDX JSON format returned by the Dependency Graph.
 * @link https://docs.github.com/
 */
class DependencyGraphSpdxSbom
{
    use DataModel;

    /** @see $sbom */
    public const sbom = 'sbom';
    #[Describe(['nullable' => true])]
    public ?DependencyGraphSpdxSbomSbom $sbom = null;
}
