<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PackageVersionMetadataContainer
{
    use DataModel;

    /** @see $tags */
    public const tags = 'tags';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $tags;
}
