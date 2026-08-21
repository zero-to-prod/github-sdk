<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Details for the GitHub Security Advisory.
 * @link https://docs.github.com/
 */
class DependabotAlertSecurityAdvisory
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

    /** @see $summary */
    public const summary = 'summary';
    #[Describe(['nullable' => true])]
    public ?string $summary = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $vulnerabilities */
    public const vulnerabilities = 'vulnerabilities';
    /** @var array<int, DependabotAlertSecurityVulnerability> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => DependabotAlertSecurityVulnerability::class,
        'default' => [],
    ])]
    public array $vulnerabilities;

    /** @see $severity */
    public const severity = 'severity';
    #[Describe(['default' => DependabotAlertSecurityVulnerabilitySeverity::unknown])]
    public DependabotAlertSecurityVulnerabilitySeverity $severity;

    /** @see $classification */
    public const classification = 'classification';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertSecurityAdvisoryClassification $classification = null;

    /** @see $cvss */
    public const cvss = 'cvss';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertSecurityAdvisoryCvss $cvss = null;

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
    /** @var array<int, DependabotAlertSecurityAdvisoryCwesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => DependabotAlertSecurityAdvisoryCwesItem::class,
        'default' => [],
    ])]
    public array $cwes;

    /** @see $identifiers */
    public const identifiers = 'identifiers';
    /** @var array<int, DependabotAlertSecurityAdvisoryIdentifiersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => DependabotAlertSecurityAdvisoryIdentifiersItem::class,
        'default' => [],
    ])]
    public array $identifiers;

    /** @see $references */
    public const references = 'references';
    /** @var array<int, DependabotAlertSecurityAdvisoryReferencesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => DependabotAlertSecurityAdvisoryReferencesItem::class,
        'default' => [],
    ])]
    public array $references;

    /** @see $published_at */
    public const published_at = 'published_at';
    #[Describe(['nullable' => true])]
    public ?string $published_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $withdrawn_at */
    public const withdrawn_at = 'withdrawn_at';
    #[Describe(['nullable' => true])]
    public ?string $withdrawn_at = null;
}
