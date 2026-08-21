<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class RepositoryAdvisoryUpdate
{
    use DataModel;

    /** @see $summary */
    public const summary = 'summary';
    #[Describe(['nullable' => true])]
    public ?string $summary = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $cve_id */
    public const cve_id = 'cve_id';
    #[Describe(['nullable' => true])]
    public ?string $cve_id = null;

    /** @see $vulnerabilities */
    public const vulnerabilities = 'vulnerabilities';
    /** @var array<int, RepositoryAdvisoryUpdateVulnerabilitiesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => RepositoryAdvisoryUpdateVulnerabilitiesItem::class,
        'default' => [],
    ])]
    public array $vulnerabilities;

    /** @see $cwe_ids */
    public const cwe_ids = 'cwe_ids';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $cwe_ids;

    /** @see $credits */
    public const credits = 'credits';
    /** @var array<int, RepositoryAdvisoryUpdateCreditsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => RepositoryAdvisoryUpdateCreditsItem::class,
        'default' => [],
    ])]
    public array $credits;

    /** @see $severity */
    public const severity = 'severity';
    #[Describe(['nullable' => true])]
    public ?RepositoryAdvisorySeverity $severity = null;

    /** @see $cvss_vector_string */
    public const cvss_vector_string = 'cvss_vector_string';
    #[Describe(['nullable' => true])]
    public ?string $cvss_vector_string = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?RepositoryAdvisoryUpdateState $state = null;

    /** @see $collaborating_users */
    public const collaborating_users = 'collaborating_users';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $collaborating_users;

    /** @see $collaborating_teams */
    public const collaborating_teams = 'collaborating_teams';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $collaborating_teams;
}
