<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningVariantAnalysisScannedRepositoriesItem
{
    use DataModel;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?CodeScanningVariantAnalysisRepository $repository = null;

    /** @see $analysis_status */
    public const analysis_status = 'analysis_status';
    #[Describe(['default' => CodeScanningVariantAnalysisStatus::unknown])]
    public CodeScanningVariantAnalysisStatus $analysis_status;

    /** @see $result_count */
    public const result_count = 'result_count';
    #[Describe(['nullable' => true])]
    public ?int $result_count = null;

    /** @see $artifact_size_in_bytes */
    public const artifact_size_in_bytes = 'artifact_size_in_bytes';
    #[Describe(['nullable' => true])]
    public ?int $artifact_size_in_bytes = null;

    /** @see $failure_message */
    public const failure_message = 'failure_message';
    #[Describe(['nullable' => true])]
    public ?string $failure_message = null;
}
