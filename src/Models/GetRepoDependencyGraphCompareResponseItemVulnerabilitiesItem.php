<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GetRepoDependencyGraphCompareResponseItemVulnerabilitiesItem
{
    use DataModel;

    /** @see $severity */
    public const severity = 'severity';
    #[Describe(['nullable' => true])]
    public ?string $severity = null;

    /** @see $advisory_ghsa_id */
    public const advisory_ghsa_id = 'advisory_ghsa_id';
    #[Describe(['nullable' => true])]
    public ?string $advisory_ghsa_id = null;

    /** @see $advisory_summary */
    public const advisory_summary = 'advisory_summary';
    #[Describe(['nullable' => true])]
    public ?string $advisory_summary = null;

    /** @see $advisory_url */
    public const advisory_url = 'advisory_url';
    #[Describe(['nullable' => true])]
    public ?string $advisory_url = null;
}
