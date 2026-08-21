<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A repository security advisory.
 * @link https://docs.github.com/
 */
class RepositoryAdvisory
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

    /** @see $summary */
    public const summary = 'summary';
    #[Describe(['nullable' => true])]
    public ?string $summary = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $severity */
    public const severity = 'severity';
    #[Describe(['nullable' => true])]
    public ?RepositoryAdvisorySeverity $severity = null;

    /** @see $author */
    public const author = 'author';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $author = null;

    /** @see $publisher */
    public const publisher = 'publisher';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $publisher = null;

    /** @see $identifiers */
    public const identifiers = 'identifiers';
    /** @var array<int, RepositoryAdvisoryIdentifiersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => RepositoryAdvisoryIdentifiersItem::class,
        'default' => [],
    ])]
    public array $identifiers;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => RepositoryAdvisoryState::unknown])]
    public RepositoryAdvisoryState $state;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $published_at */
    public const published_at = 'published_at';
    #[Describe(['nullable' => true])]
    public ?string $published_at = null;

    /** @see $closed_at */
    public const closed_at = 'closed_at';
    #[Describe(['nullable' => true])]
    public ?string $closed_at = null;

    /** @see $withdrawn_at */
    public const withdrawn_at = 'withdrawn_at';
    #[Describe(['nullable' => true])]
    public ?string $withdrawn_at = null;

    /** @see $submission */
    public const submission = 'submission';
    #[Describe(['nullable' => true])]
    public ?RepositoryAdvisorySubmission $submission = null;

    /** @see $vulnerabilities */
    public const vulnerabilities = 'vulnerabilities';
    /** @var array<int, RepositoryAdvisoryVulnerability> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => RepositoryAdvisoryVulnerability::class,
        'default' => [],
    ])]
    public array $vulnerabilities;

    /** @see $cvss */
    public const cvss = 'cvss';
    #[Describe(['nullable' => true])]
    public ?RepositoryAdvisoryCvss $cvss = null;

    /** @see $cvss_severities */
    public const cvss_severities = 'cvss_severities';
    #[Describe(['nullable' => true])]
    public ?CvssSeverities $cvss_severities = null;

    /** @see $cwes */
    public const cwes = 'cwes';
    /** @var array<int, RepositoryAdvisoryCwesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => RepositoryAdvisoryCwesItem::class,
        'default' => [],
    ])]
    public array $cwes;

    /** @see $cwe_ids */
    public const cwe_ids = 'cwe_ids';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $cwe_ids;

    /** @see $credits */
    public const credits = 'credits';
    /** @var array<int, RepositoryAdvisoryCreditsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => RepositoryAdvisoryCreditsItem::class,
        'default' => [],
    ])]
    public array $credits;

    /** @see $credits_detailed */
    public const credits_detailed = 'credits_detailed';
    /** @var array<int, RepositoryAdvisoryCredit> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => RepositoryAdvisoryCredit::class,
        'default' => [],
    ])]
    public array $credits_detailed;

    /** @see $collaborating_users */
    public const collaborating_users = 'collaborating_users';
    /** @var array<int, SimpleUser> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SimpleUser::class,
        'default' => [],
    ])]
    public array $collaborating_users;

    /** @see $collaborating_teams */
    public const collaborating_teams = 'collaborating_teams';
    /** @var array<int, Team> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Team::class,
        'default' => [],
    ])]
    public array $collaborating_teams;

    /** @see $private_fork */
    public const private_fork = 'private_fork';
    #[Describe(['nullable' => true])]
    public ?SimpleRepository $private_fork = null;
}
