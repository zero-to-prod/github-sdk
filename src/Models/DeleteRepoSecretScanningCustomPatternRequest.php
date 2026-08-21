<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DeleteRepoSecretScanningCustomPatternRequest
{
    use DataModel;

    /** @see $patterns */
    public const patterns = 'patterns';
    /** @var array<int, SecretScanningCustomPatternToDelete> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecretScanningCustomPatternToDelete::class,
        'default' => [],
    ])]
    public array $patterns;

    /** @see $post_delete_action */
    public const post_delete_action = 'post_delete_action';
    #[Describe(['nullable' => true])]
    public ?DeleteOrgSecretScanningCustomPatternRequestPostDeleteAction $post_delete_action = null;
}
