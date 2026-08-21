<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Configuration for code scanning default setup.
 * @link https://docs.github.com/
 */
class CodeScanningDefaultSetupUpdate
{
    use DataModel;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?CodeQualitySetupState $state = null;

    /** @see $runner_type */
    public const runner_type = 'runner_type';
    #[Describe(['nullable' => true])]
    public ?CodeQualitySetupRunnerType $runner_type = null;

    /** @see $runner_label */
    public const runner_label = 'runner_label';
    #[Describe(['nullable' => true])]
    public ?string $runner_label = null;

    /** @see $query_suite */
    public const query_suite = 'query_suite';
    #[Describe(['nullable' => true])]
    public ?CodeScanningDefaultSetupQuerySuite $query_suite = null;

    /** @see $threat_model */
    public const threat_model = 'threat_model';
    #[Describe(['nullable' => true])]
    public ?CodeScanningDefaultSetupThreatModel $threat_model = null;

    /** @see $languages */
    public const languages = 'languages';
    /** @var array<int, CodeScanningDefaultSetupUpdateLanguagesItem|null> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CodeScanningDefaultSetupUpdateLanguagesItem::class,
        'method' => 'tryFrom',
        'default' => [],
    ])]
    public array $languages;
}
