<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Configuration for code quality setup.
 * @link https://docs.github.com/
 */
class CodeQualitySetup
{
    use DataModel;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?CodeQualitySetupState $state = null;

    /** @see $languages */
    public const languages = 'languages';
    /** @var array<int, CodeQualitySetupLanguagesItem|null> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CodeQualitySetupLanguagesItem::class,
        'method' => 'tryFrom',
        'default' => [],
    ])]
    public array $languages;

    /** @see $runner_type */
    public const runner_type = 'runner_type';
    #[Describe(['nullable' => true])]
    public ?CodeQualitySetupRunnerType $runner_type = null;

    /** @see $runner_label */
    public const runner_label = 'runner_label';
    #[Describe(['nullable' => true])]
    public ?string $runner_label = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $schedule */
    public const schedule = 'schedule';
    #[Describe(['nullable' => true])]
    public ?CodeQualitySetupSchedule $schedule = null;

    /** @see $ai_findings_option */
    public const ai_findings_option = 'ai_findings_option';
    #[Describe(['nullable' => true])]
    public ?CodeQualitySetupAiFindingsOption $ai_findings_option = null;
}
