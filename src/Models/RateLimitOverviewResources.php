<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class RateLimitOverviewResources
{
    use DataModel;

    /** @see $core */
    public const core = 'core';
    #[Describe(['nullable' => true])]
    public ?RateLimit $core = null;

    /** @see $graphql */
    public const graphql = 'graphql';
    #[Describe(['nullable' => true])]
    public ?RateLimit $graphql = null;

    /** @see $search */
    public const search = 'search';
    #[Describe(['nullable' => true])]
    public ?RateLimit $search = null;

    /** @see $code_search */
    public const code_search = 'code_search';
    #[Describe(['nullable' => true])]
    public ?RateLimit $code_search = null;

    /** @see $source_import */
    public const source_import = 'source_import';
    #[Describe(['nullable' => true])]
    public ?RateLimit $source_import = null;

    /** @see $integration_manifest */
    public const integration_manifest = 'integration_manifest';
    #[Describe(['nullable' => true])]
    public ?RateLimit $integration_manifest = null;

    /** @see $actions_runner_registration */
    public const actions_runner_registration = 'actions_runner_registration';
    #[Describe(['nullable' => true])]
    public ?RateLimit $actions_runner_registration = null;

    /** @see $scim */
    public const scim = 'scim';
    #[Describe(['nullable' => true])]
    public ?RateLimit $scim = null;

    /** @see $dependency_snapshots */
    public const dependency_snapshots = 'dependency_snapshots';
    #[Describe(['nullable' => true])]
    public ?RateLimit $dependency_snapshots = null;

    /** @see $dependency_sbom */
    public const dependency_sbom = 'dependency_sbom';
    #[Describe(['nullable' => true])]
    public ?RateLimit $dependency_sbom = null;

    /** @see $code_scanning_autofix */
    public const code_scanning_autofix = 'code_scanning_autofix';
    #[Describe(['nullable' => true])]
    public ?RateLimit $code_scanning_autofix = null;

    /** @see $copilot_usage_records */
    public const copilot_usage_records = 'copilot_usage_records';
    #[Describe(['nullable' => true])]
    public ?RateLimit $copilot_usage_records = null;
}
