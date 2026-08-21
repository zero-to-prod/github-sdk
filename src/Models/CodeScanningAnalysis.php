<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningAnalysis
{
    use DataModel;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;

    /** @see $commit_sha */
    public const commit_sha = 'commit_sha';
    #[Describe(['nullable' => true])]
    public ?string $commit_sha = null;

    /** @see $analysis_key */
    public const analysis_key = 'analysis_key';
    #[Describe(['nullable' => true])]
    public ?string $analysis_key = null;

    /** @see $environment */
    public const environment = 'environment';
    #[Describe(['nullable' => true])]
    public ?string $environment = null;

    /** @see $category */
    public const category = 'category';
    #[Describe(['nullable' => true])]
    public ?string $category = null;

    /** @see $error */
    public const error = 'error';
    #[Describe(['nullable' => true])]
    public ?string $error = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $results_count */
    public const results_count = 'results_count';
    #[Describe(['nullable' => true])]
    public ?int $results_count = null;

    /** @see $rules_count */
    public const rules_count = 'rules_count';
    #[Describe(['nullable' => true])]
    public ?int $rules_count = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $sarif_id */
    public const sarif_id = 'sarif_id';
    #[Describe(['nullable' => true])]
    public ?string $sarif_id = null;

    /** @see $tool */
    public const tool = 'tool';
    #[Describe(['nullable' => true])]
    public ?CodeScanningAnalysisTool $tool = null;

    /** @see $deletable */
    public const deletable = 'deletable';
    #[Describe(['nullable' => true])]
    public ?bool $deletable = null;

    /** @see $warning */
    public const warning = 'warning';
    #[Describe(['nullable' => true])]
    public ?string $warning = null;
}
