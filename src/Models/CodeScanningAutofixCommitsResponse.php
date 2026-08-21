<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningAutofixCommitsResponse
{
    use DataModel;

    /** @see $target_ref */
    public const target_ref = 'target_ref';
    #[Describe(['nullable' => true])]
    public ?string $target_ref = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;
}
