<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A Dependabot alert.
 * @link https://docs.github.com/
 */
class DependabotAlert
{
    use DataModel;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => DependabotAlertWithRepositoryState::unknown])]
    public DependabotAlertWithRepositoryState $state;

    /** @see $dependency */
    public const dependency = 'dependency';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertDependency $dependency = null;

    /** @see $security_advisory */
    public const security_advisory = 'security_advisory';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertSecurityAdvisory $security_advisory = null;

    /** @see $security_vulnerability */
    public const security_vulnerability = 'security_vulnerability';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertSecurityVulnerability $security_vulnerability = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $dismissed_at */
    public const dismissed_at = 'dismissed_at';
    #[Describe(['nullable' => true])]
    public ?string $dismissed_at = null;

    /** @see $dismissed_by */
    public const dismissed_by = 'dismissed_by';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $dismissed_by = null;

    /** @see $dismissed_reason */
    public const dismissed_reason = 'dismissed_reason';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertWithRepositoryDismissedReason $dismissed_reason = null;

    /** @see $dismissed_comment */
    public const dismissed_comment = 'dismissed_comment';
    #[Describe(['nullable' => true])]
    public ?string $dismissed_comment = null;

    /** @see $fixed_at */
    public const fixed_at = 'fixed_at';
    #[Describe(['nullable' => true])]
    public ?string $fixed_at = null;

    /** @see $auto_dismissed_at */
    public const auto_dismissed_at = 'auto_dismissed_at';
    #[Describe(['nullable' => true])]
    public ?string $auto_dismissed_at = null;

    /** @see $dismissal_request */
    public const dismissal_request = 'dismissal_request';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertDismissalRequestSimple $dismissal_request = null;

    /** @see $assignees */
    public const assignees = 'assignees';
    /** @var array<int, SimpleUser> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SimpleUser::class,
        'default' => [],
    ])]
    public array $assignees;
}
