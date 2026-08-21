<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CommitSearchResultItemCommitAuthor
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
