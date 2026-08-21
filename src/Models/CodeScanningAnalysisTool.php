<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningAnalysisTool
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $version */
    public const version = 'version';
    #[Describe(['nullable' => true])]
    public ?string $version = null;

    /** @see $guid */
    public const guid = 'guid';
    #[Describe(['nullable' => true])]
    public ?string $guid = null;
}
