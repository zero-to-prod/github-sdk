<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The image of runner. To list all available images, use `GET
 * /actions/hosted-runners/images/github-owned` or `GET
 * /actions/hosted-runners/images/partner`.
 * @link https://docs.github.com/
 */
class CreateOrgActionHostedRunnerRequestImage
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $source */
    public const source = 'source';
    #[Describe(['nullable' => true])]
    public ?NullableActionsHostedRunnerPoolImageSource $source = null;

    /** @see $version */
    public const version = 'version';
    #[Describe(['nullable' => true])]
    public ?string $version = null;
}
