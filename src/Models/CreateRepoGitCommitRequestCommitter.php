<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Information about the person who is making the commit. By default,
 * `committer` will use the information set in `author`. See the `author` and
 * `committer` object below for details.
 * @link https://docs.github.com/
 */
class CreateRepoGitCommitRequestCommitter
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $email */
    public const email = 'email';
    #[Describe(['nullable' => true])]
    public ?string $email = null;

    /** @see $date */
    public const date = 'date';
    #[Describe(['nullable' => true])]
    public ?string $date = null;
}
