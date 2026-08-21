<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningOrganizationAlertItems
{
    use DataModel;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $instances_url */
    public const instances_url = 'instances_url';
    #[Describe(['nullable' => true])]
    public ?string $instances_url = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?CodeScanningAlertState $state = null;

    /** @see $fixed_at */
    public const fixed_at = 'fixed_at';
    #[Describe(['nullable' => true])]
    public ?string $fixed_at = null;

    /** @see $dismissed_by */
    public const dismissed_by = 'dismissed_by';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $dismissed_by = null;

    /** @see $dismissed_at */
    public const dismissed_at = 'dismissed_at';
    #[Describe(['nullable' => true])]
    public ?string $dismissed_at = null;

    /** @see $dismissed_reason */
    public const dismissed_reason = 'dismissed_reason';
    #[Describe(['nullable' => true])]
    public ?CodeScanningAlertDismissedReason $dismissed_reason = null;

    /** @see $dismissed_comment */
    public const dismissed_comment = 'dismissed_comment';
    #[Describe(['nullable' => true])]
    public ?string $dismissed_comment = null;

    /** @see $rule */
    public const rule = 'rule';
    #[Describe(['nullable' => true])]
    public ?CodeScanningAlertRuleSummary $rule = null;

    /** @see $tool */
    public const tool = 'tool';
    #[Describe(['nullable' => true])]
    public ?CodeScanningAnalysisTool $tool = null;

    /** @see $most_recent_instance */
    public const most_recent_instance = 'most_recent_instance';
    #[Describe(['nullable' => true])]
    public ?CodeScanningAlertInstance $most_recent_instance = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?SimpleRepository $repository = null;

    /** @see $dismissal_approved_by */
    public const dismissal_approved_by = 'dismissal_approved_by';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $dismissal_approved_by = null;

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
