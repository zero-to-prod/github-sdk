<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningVariantAnalysisSkippedRepoGroup
{
    use DataModel;

    /** @see $repository_count */
    public const repository_count = 'repository_count';
    #[Describe(['nullable' => true])]
    public ?int $repository_count = null;

    /** @see $repositories */
    public const repositories = 'repositories';
    /** @var array<int, CodeScanningVariantAnalysisRepository> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CodeScanningVariantAnalysisRepository::class,
        'default' => [],
    ])]
    public array $repositories;
}
