<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Configuration for iteration fields.
 * @link https://docs.github.com/
 */
class ProjectsV2FieldConfiguration
{
    use DataModel;

    /** @see $start_day */
    public const start_day = 'start_day';
    #[Describe(['nullable' => true])]
    public ?int $start_day = null;

    /** @see $duration */
    public const duration = 'duration';
    #[Describe(['nullable' => true])]
    public ?int $duration = null;

    /** @see $iterations */
    public const iterations = 'iterations';
    /** @var array<int, ProjectsV2IterationSettings> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ProjectsV2IterationSettings::class,
        'default' => [],
    ])]
    public array $iterations;
}
