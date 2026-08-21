<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Configuration for code quality setup.
 * @link https://docs.github.com/
 */
class CodeQualitySetupUpdate
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

    /** @see $languages */
    public const languages = 'languages';
    /** @var array<int, CodeQualitySetupUpdateLanguagesItem|null> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CodeQualitySetupUpdateLanguagesItem::class,
        'method' => 'tryFrom',
        'default' => [],
    ])]
    public array $languages;

    /** @see $ai_findings_option */
    public const ai_findings_option = 'ai_findings_option';
    #[Describe(['nullable' => true])]
    public ?CodeQualitySetupAiFindingsOption $ai_findings_option = null;
}
