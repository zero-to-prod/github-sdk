<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * An iteration setting for an iteration field
 * @link https://docs.github.com/
 */
class ProjectsV2IterationSettings
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $start_date */
    public const start_date = 'start_date';
    #[Describe(['nullable' => true])]
    public ?string $start_date = null;

    /** @see $duration */
    public const duration = 'duration';
    #[Describe(['nullable' => true])]
    public ?int $duration = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?ProjectsV2IterationSettingsTitle $title = null;

    /** @see $completed */
    public const completed = 'completed';
    #[Describe(['nullable' => true])]
    public ?bool $completed = null;
}
