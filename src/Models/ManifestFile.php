<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ManifestFile
{
    use DataModel;

    /** @see $source_location */
    public const source_location = 'source_location';
    #[Describe(['nullable' => true])]
    public ?string $source_location = null;
}
