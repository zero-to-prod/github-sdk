<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgActionRunnerLabelResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $labels */
    public const labels = 'labels';
    /** @var array<int, RunnerLabel> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => RunnerLabel::class,
        'default' => [],
    ])]
    public array $labels;
}
