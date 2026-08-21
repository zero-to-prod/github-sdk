<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The enabled review tools for Copilot cloud agent.
 * @link https://docs.github.com/
 */
class ListRepoCopilotCloudAgentConfigurationsResponseEnabledTools
{
    use DataModel;

    /** @see $codeql */
    public const codeql = 'codeql';
    #[Describe(['nullable' => true])]
    public ?bool $codeql = null;

    /** @see $copilot_code_review */
    public const copilot_code_review = 'copilot_code_review';
    #[Describe(['nullable' => true])]
    public ?bool $copilot_code_review = null;

    /** @see $secret_scanning */
    public const secret_scanning = 'secret_scanning';
    #[Describe(['nullable' => true])]
    public ?bool $secret_scanning = null;

    /** @see $dependency_vulnerability_checks */
    public const dependency_vulnerability_checks = 'dependency_vulnerability_checks';
    #[Describe(['nullable' => true])]
    public ?bool $dependency_vulnerability_checks = null;
}
