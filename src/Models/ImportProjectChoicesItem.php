<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ImportProjectChoicesItem
{
    use DataModel;

    /** @see $vcs */
    public const vcs = 'vcs';
    #[Describe(['nullable' => true])]
    public ?string $vcs = null;

    /** @see $tfvc_project */
    public const tfvc_project = 'tfvc_project';
    #[Describe(['nullable' => true])]
    public ?string $tfvc_project = null;

    /** @see $human_name */
    public const human_name = 'human_name';
    #[Describe(['nullable' => true])]
    public ?string $human_name = null;
}
