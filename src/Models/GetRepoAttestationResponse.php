<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GetRepoAttestationResponse
{
    use DataModel;

    /** @see $attestations */
    public const attestations = 'attestations';
    /** @var array<int, GetRepoAttestationResponseAttestationsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => GetRepoAttestationResponseAttestationsItem::class,
        'default' => [],
    ])]
    public array $attestations;
}
