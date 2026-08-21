<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Issue Event Rename
 * @link https://docs.github.com/
 */
class IssueEventRename
{
    use DataModel;

    /** @see $from */
    public const from = 'from';
    #[Describe(['nullable' => true])]
    public ?string $from = null;

    /** @see $to */
    public const to = 'to';
    #[Describe(['nullable' => true])]
    public ?string $to = null;
}
