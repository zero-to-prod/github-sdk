<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The layout of the view.
 * @link https://docs.github.com/
 */
enum ProjectsV2ViewLayout: string
{
    case unknown = 'unknown';
    case table = 'table';
    case board = 'board';
    case roadmap = 'roadmap';
}
