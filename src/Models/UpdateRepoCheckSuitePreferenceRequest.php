<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoCheckSuitePreferenceRequest
{
    use DataModel;

    /** @see $auto_trigger_checks */
    public const auto_trigger_checks = 'auto_trigger_checks';
    /** @var array<int, UpdateRepoCheckSuitePreferenceRequestAutoTriggerChecksItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateRepoCheckSuitePreferenceRequestAutoTriggerChecksItem::class,
        'default' => [],
    ])]
    public array $auto_trigger_checks;
}
