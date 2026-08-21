<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningVariantAnalysisRepoTask
{
    use DataModel;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?SimpleRepository $repository = null;

    /** @see $analysis_status */
    public const analysis_status = 'analysis_status';
    #[Describe(['default' => CodeScanningVariantAnalysisStatus::unknown])]
    public CodeScanningVariantAnalysisStatus $analysis_status;

    /** @see $artifact_size_in_bytes */
    public const artifact_size_in_bytes = 'artifact_size_in_bytes';
    #[Describe(['nullable' => true])]
    public ?int $artifact_size_in_bytes = null;

    /** @see $result_count */
    public const result_count = 'result_count';
    #[Describe(['nullable' => true])]
    public ?int $result_count = null;

    /** @see $failure_message */
    public const failure_message = 'failure_message';
    #[Describe(['nullable' => true])]
    public ?string $failure_message = null;

    /** @see $database_commit_sha */
    public const database_commit_sha = 'database_commit_sha';
    #[Describe(['nullable' => true])]
    public ?string $database_commit_sha = null;

    /** @see $source_location_prefix */
    public const source_location_prefix = 'source_location_prefix';
    #[Describe(['nullable' => true])]
    public ?string $source_location_prefix = null;

    /** @see $artifact_url */
    public const artifact_url = 'artifact_url';
    #[Describe(['nullable' => true])]
    public ?string $artifact_url = null;
}
