<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoActionRunnerGenerateJitconfigRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $runner_group_id */
    public const runner_group_id = 'runner_group_id';
    #[Describe(['nullable' => true])]
    public ?int $runner_group_id = null;

    /** @see $labels */
    public const labels = 'labels';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $labels;

    /** @see $work_folder */
    public const work_folder = 'work_folder';
    #[Describe(['nullable' => true])]
    public ?string $work_folder = null;
}
