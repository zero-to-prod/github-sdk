<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A run of a CodeQL query against one or more repositories.
 * @link https://docs.github.com/
 */
class CodeScanningVariantAnalysis
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $controller_repo */
    public const controller_repo = 'controller_repo';
    #[Describe(['nullable' => true])]
    public ?SimpleRepository $controller_repo = null;

    /** @see $actor */
    public const actor = 'actor';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $actor = null;

    /** @see $query_language */
    public const query_language = 'query_language';
    #[Describe(['default' => CodeScanningVariantAnalysisLanguage::unknown])]
    public CodeScanningVariantAnalysisLanguage $query_language;

    /** @see $query_pack_url */
    public const query_pack_url = 'query_pack_url';
    #[Describe(['nullable' => true])]
    public ?string $query_pack_url = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $completed_at */
    public const completed_at = 'completed_at';
    #[Describe(['nullable' => true])]
    public ?string $completed_at = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => CodeScanningVariantAnalysisStatus2::unknown])]
    public CodeScanningVariantAnalysisStatus2 $status;

    /** @see $actions_workflow_run_id */
    public const actions_workflow_run_id = 'actions_workflow_run_id';
    #[Describe(['nullable' => true])]
    public ?int $actions_workflow_run_id = null;

    /** @see $failure_reason */
    public const failure_reason = 'failure_reason';
    #[Describe(['nullable' => true])]
    public ?CodeScanningVariantAnalysisFailureReason $failure_reason = null;

    /** @see $scanned_repositories */
    public const scanned_repositories = 'scanned_repositories';
    /** @var array<int, CodeScanningVariantAnalysisScannedRepositoriesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CodeScanningVariantAnalysisScannedRepositoriesItem::class,
        'default' => [],
    ])]
    public array $scanned_repositories;

    /** @see $skipped_repositories */
    public const skipped_repositories = 'skipped_repositories';
    #[Describe(['nullable' => true])]
    public ?CodeScanningVariantAnalysisSkippedRepositories $skipped_repositories = null;
}
