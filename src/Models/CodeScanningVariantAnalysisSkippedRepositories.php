<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Information about repositories that were skipped from processing. This
 * information is only available to the user that initiated the variant
 * analysis.
 * @link https://docs.github.com/
 */
class CodeScanningVariantAnalysisSkippedRepositories
{
    use DataModel;

    /** @see $access_mismatch_repos */
    public const access_mismatch_repos = 'access_mismatch_repos';
    #[Describe(['nullable' => true])]
    public ?CodeScanningVariantAnalysisSkippedRepoGroup $access_mismatch_repos = null;

    /** @see $not_found_repos */
    public const not_found_repos = 'not_found_repos';
    #[Describe(['nullable' => true])]
    public ?CodeScanningVariantAnalysisSkippedRepositoriesNotFoundRepos $not_found_repos = null;

    /** @see $no_codeql_db_repos */
    public const no_codeql_db_repos = 'no_codeql_db_repos';
    #[Describe(['nullable' => true])]
    public ?CodeScanningVariantAnalysisSkippedRepoGroup $no_codeql_db_repos = null;

    /** @see $over_limit_repos */
    public const over_limit_repos = 'over_limit_repos';
    #[Describe(['nullable' => true])]
    public ?CodeScanningVariantAnalysisSkippedRepoGroup $over_limit_repos = null;
}
