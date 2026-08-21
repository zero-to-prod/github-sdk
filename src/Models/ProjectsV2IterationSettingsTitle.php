<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The iteration title, in raw text and HTML formats.
 * @link https://docs.github.com/
 */
class ProjectsV2IterationSettingsTitle
{
    use DataModel;

    /** @see $raw */
    public const raw = 'raw';
    #[Describe(['nullable' => true])]
    public ?string $raw = null;

    /** @see $html */
    public const html = 'html';
    #[Describe(['nullable' => true])]
    public ?string $html = null;
}
