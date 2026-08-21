<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateGistRequestFilesValue
{
    use DataModel;

    /** @see $content */
    public const content = 'content';
    #[Describe(['nullable' => true])]
    public ?string $content = null;

    /** @see $filename */
    public const filename = 'filename';
    #[Describe(['nullable' => true])]
    public ?string $filename = null;
}
