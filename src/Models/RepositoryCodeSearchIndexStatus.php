<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The status of the code search index for this repository
 * @link https://docs.github.com/
 */
class RepositoryCodeSearchIndexStatus
{
    use DataModel;

    /** @see $lexical_search_ok */
    public const lexical_search_ok = 'lexical_search_ok';
    #[Describe(['nullable' => true])]
    public ?bool $lexical_search_ok = null;

    /** @see $lexical_commit_sha */
    public const lexical_commit_sha = 'lexical_commit_sha';
    #[Describe(['nullable' => true])]
    public ?string $lexical_commit_sha = null;
}
