<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class SecretScanningScanHistory
{
    use DataModel;

    /** @see $incremental_scans */
    public const incremental_scans = 'incremental_scans';
    /** @var array<int, SecretScanningScan> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecretScanningScan::class,
        'default' => [],
    ])]
    public array $incremental_scans;

    /** @see $pattern_update_scans */
    public const pattern_update_scans = 'pattern_update_scans';
    /** @var array<int, SecretScanningScan> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecretScanningScan::class,
        'default' => [],
    ])]
    public array $pattern_update_scans;

    /** @see $backfill_scans */
    public const backfill_scans = 'backfill_scans';
    /** @var array<int, SecretScanningScan> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecretScanningScan::class,
        'default' => [],
    ])]
    public array $backfill_scans;

    /** @see $custom_pattern_backfill_scans */
    public const custom_pattern_backfill_scans = 'custom_pattern_backfill_scans';
    /** @var array<int, SecretScanningScanHistoryCustomPatternBackfillScansItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecretScanningScanHistoryCustomPatternBackfillScansItem::class,
        'default' => [],
    ])]
    public array $custom_pattern_backfill_scans;

    /** @see $generic_secrets_backfill_scans */
    public const generic_secrets_backfill_scans = 'generic_secrets_backfill_scans';
    /** @var array<int, SecretScanningScan> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecretScanningScan::class,
        'default' => [],
    ])]
    public array $generic_secrets_backfill_scans;
}
