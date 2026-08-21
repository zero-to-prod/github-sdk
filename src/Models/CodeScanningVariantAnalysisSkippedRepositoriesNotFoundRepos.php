<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningVariantAnalysisSkippedRepositoriesNotFoundRepos
{
    use DataModel;

    /** @see $repository_count */
    public const repository_count = 'repository_count';
    #[Describe(['nullable' => true])]
    public ?int $repository_count = null;

    /** @see $repository_full_names */
    public const repository_full_names = 'repository_full_names';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $repository_full_names;
}
