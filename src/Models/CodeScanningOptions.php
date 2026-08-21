<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Security Configuration feature options for code scanning
 * @link https://docs.github.com/
 */
class CodeScanningOptions
{
    use DataModel;

    /** @see $allow_advanced */
    public const allow_advanced = 'allow_advanced';
    #[Describe(['nullable' => true])]
    public ?bool $allow_advanced = null;
}
