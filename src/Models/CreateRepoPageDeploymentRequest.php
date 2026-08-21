<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The object used to create GitHub Pages deployment
 * @link https://docs.github.com/
 */
class CreateRepoPageDeploymentRequest
{
    use DataModel;

    /** @see $artifact_id */
    public const artifact_id = 'artifact_id';
    #[Describe(['nullable' => true])]
    public ?float $artifact_id = null;

    /** @see $artifact_url */
    public const artifact_url = 'artifact_url';
    #[Describe(['nullable' => true])]
    public ?string $artifact_url = null;

    /** @see $environment */
    public const environment = 'environment';
    #[Describe(['nullable' => true])]
    public ?string $environment = null;

    /** @see $pages_build_version */
    public const pages_build_version = 'pages_build_version';
    #[Describe(['nullable' => true])]
    public ?string $pages_build_version = null;

    /** @see $oidc_token */
    public const oidc_token = 'oidc_token';
    #[Describe(['nullable' => true])]
    public ?string $oidc_token = null;
}
