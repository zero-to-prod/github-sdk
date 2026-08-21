<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The reason for a failure of the variant analysis. This is only available
 * if the variant analysis has failed.
 * @link https://docs.github.com/
 */
enum CodeScanningVariantAnalysisFailureReason: string
{
    case unknown = 'unknown';
    case no_repos_queried = 'no_repos_queried';
    case actions_workflow_run_failed = 'actions_workflow_run_failed';
    case internal_error = 'internal_error';
}
