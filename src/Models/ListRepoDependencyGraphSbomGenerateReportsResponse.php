<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoDependencyGraphSbomGenerateReportsResponse
{
    use DataModel;

    /** @see $sbom_url */
    public const sbom_url = 'sbom_url';
    #[Describe(['nullable' => true])]
    public ?string $sbom_url = null;
}
