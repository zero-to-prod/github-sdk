<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Successful deletion of a code scanning analysis
 * @link https://docs.github.com/
 */
class CodeScanningAnalysisDeletion
{
    use DataModel;

    /** @see $next_analysis_url */
    public const next_analysis_url = 'next_analysis_url';
    #[Describe(['nullable' => true])]
    public ?string $next_analysis_url = null;

    /** @see $confirm_delete_url */
    public const confirm_delete_url = 'confirm_delete_url';
    #[Describe(['nullable' => true])]
    public ?string $confirm_delete_url = null;
}
