<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The process in which the Page will be built.
 * @link https://docs.github.com/
 */
enum PageBuildType: string
{
    case unknown = 'unknown';
    case legacy = 'legacy';
    case workflow = 'workflow';
}
