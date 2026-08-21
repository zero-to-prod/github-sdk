<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningAlertRule
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $severity */
    public const severity = 'severity';
    #[Describe(['nullable' => true])]
    public ?CodeScanningAlertRuleSummarySeverity $severity = null;

    /** @see $security_severity_level */
    public const security_severity_level = 'security_severity_level';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertSecurityVulnerabilitySeverity $security_severity_level = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $full_description */
    public const full_description = 'full_description';
    #[Describe(['nullable' => true])]
    public ?string $full_description = null;

    /** @see $tags */
    public const tags = 'tags';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $tags;

    /** @see $help */
    public const help = 'help';
    #[Describe(['nullable' => true])]
    public ?string $help = null;

    /** @see $help_uri */
    public const help_uri = 'help_uri';
    #[Describe(['nullable' => true])]
    public ?string $help_uri = null;
}
