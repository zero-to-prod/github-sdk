<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A custom pattern to delete in a bulk operation.
 * @link https://docs.github.com/
 */
class SecretScanningCustomPatternToDelete
{
    use DataModel;

    /** @see $pattern_id */
    public const pattern_id = 'pattern_id';
    #[Describe(['nullable' => true])]
    public ?int $pattern_id = null;

    /** @see $custom_pattern_version */
    public const custom_pattern_version = 'custom_pattern_version';
    #[Describe(['nullable' => true])]
    public ?string $custom_pattern_version = null;
}
