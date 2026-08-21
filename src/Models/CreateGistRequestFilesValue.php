<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateGistRequestFilesValue
{
    use DataModel;

    /** @see $content */
    public const content = 'content';
    #[Describe(['nullable' => true])]
    public ?string $content = null;
}
