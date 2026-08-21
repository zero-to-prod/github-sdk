<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PackageVersionMetadataDocker
{
    use DataModel;

    /** @see $tag */
    public const tag = 'tag';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $tag;
}
