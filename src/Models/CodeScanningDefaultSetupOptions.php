<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Feature options for code scanning default setup
 * @link https://docs.github.com/
 */
class CodeScanningDefaultSetupOptions
{
    use DataModel;

    /** @see $runner_type */
    public const runner_type = 'runner_type';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationCodeScanningDefaultSetupOptionsRunnerType $runner_type = null;

    /** @see $runner_label */
    public const runner_label = 'runner_label';
    #[Describe(['nullable' => true])]
    public ?string $runner_label = null;
}
