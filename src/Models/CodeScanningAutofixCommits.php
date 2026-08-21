<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Commit an autofix for a code scanning alert
 * @link https://docs.github.com/
 */
class CodeScanningAutofixCommits
{
    use DataModel;

    /** @see $target_ref */
    public const target_ref = 'target_ref';
    #[Describe(['nullable' => true])]
    public ?string $target_ref = null;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;
}
