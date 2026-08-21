<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A GitHub Security Advisory.
 * @link https://docs.github.com/
 */
class GlobalAdvisory
{
    use DataModel;

    /** @see $ghsa_id */
    public const ghsa_id = 'ghsa_id';
    #[Describe(['nullable' => true])]
    public ?string $ghsa_id = null;

    /** @see $cve_id */
    public const cve_id = 'cve_id';
    #[Describe(['nullable' => true])]
    public ?string $cve_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $repository_advisory_url */
    public const repository_advisory_url = 'repository_advisory_url';
    #[Describe(['nullable' => true])]
    public ?string $repository_advisory_url = null;

    /** @see $summary */
    public const summary = 'summary';
    #[Describe(['nullable' => true])]
    public ?string $summary = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['default' => GlobalAdvisoryType::unknown])]
    public GlobalAdvisoryType $type;

    /** @see $severity */
    public const severity = 'severity';
    #[Describe(['default' => GlobalAdvisorySeverity::unknown])]
    public GlobalAdvisorySeverity $severity;

    /** @see $source_code_location */
    public const source_code_location = 'source_code_location';
    #[Describe(['nullable' => true])]
    public ?string $source_code_location = null;

    /** @see $identifiers */
    public const identifiers = 'identifiers';
    /** @var array<int, GlobalAdvisoryIdentifiersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => GlobalAdvisoryIdentifiersItem::class,
        'default' => [],
    ])]
    public array $identifiers;

    /** @see $references */
    public const references = 'references';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $references;

    /** @see $published_at */
    public const published_at = 'published_at';
    #[Describe(['nullable' => true])]
    public ?string $published_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $github_reviewed_at */
    public const github_reviewed_at = 'github_reviewed_at';
    #[Describe(['nullable' => true])]
    public ?string $github_reviewed_at = null;

    /** @see $nvd_published_at */
    public const nvd_published_at = 'nvd_published_at';
    #[Describe(['nullable' => true])]
    public ?string $nvd_published_at = null;

    /** @see $withdrawn_at */
    public const withdrawn_at = 'withdrawn_at';
    #[Describe(['nullable' => true])]
    public ?string $withdrawn_at = null;

    /** @see $vulnerabilities */
    public const vulnerabilities = 'vulnerabilities';
    /** @var array<int, Vulnerability> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Vulnerability::class,
        'default' => [],
    ])]
    public array $vulnerabilities;

    /** @see $cvss */
    public const cvss = 'cvss';
    #[Describe(['nullable' => true])]
    public ?GlobalAdvisoryCvss $cvss = null;

    /** @see $cvss_severities */
    public const cvss_severities = 'cvss_severities';
    #[Describe(['nullable' => true])]
    public ?CvssSeverities $cvss_severities = null;

    /** @see $epss */
    public const epss = 'epss';
    #[Describe(['nullable' => true])]
    public ?SecurityAdvisoryEpss $epss = null;

    /** @see $cwes */
    public const cwes = 'cwes';
    /** @var array<int, GlobalAdvisoryCwesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => GlobalAdvisoryCwesItem::class,
        'default' => [],
    ])]
    public array $cwes;

    /** @see $credits */
    public const credits = 'credits';
    /** @var array<int, GlobalAdvisoryCreditsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => GlobalAdvisoryCreditsItem::class,
        'default' => [],
    ])]
    public array $credits;
}
