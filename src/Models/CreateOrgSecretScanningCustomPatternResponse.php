<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgSecretScanningCustomPatternResponse
{
    use DataModel;

    /** @see $created_patterns */
    public const created_patterns = 'created_patterns';
    /** @var array<int, SecretScanningCustomPattern> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecretScanningCustomPattern::class,
        'default' => [],
    ])]
    public array $created_patterns;
}
