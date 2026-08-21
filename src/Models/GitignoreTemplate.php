<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Gitignore Template
 * @link https://docs.github.com/
 */
class GitignoreTemplate
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $source */
    public const source = 'source';
    #[Describe(['nullable' => true])]
    public ?string $source = null;
}
