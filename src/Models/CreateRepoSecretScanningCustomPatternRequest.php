<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoSecretScanningCustomPatternRequest
{
    use DataModel;

    /** @see $patterns */
    public const patterns = 'patterns';
    /** @var array<int, SecretScanningCustomPatternToCreate> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecretScanningCustomPatternToCreate::class,
        'default' => [],
    ])]
    public array $patterns;
}
