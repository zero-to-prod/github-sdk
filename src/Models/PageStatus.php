<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The status of the most recent build of the Page.
 * @link https://docs.github.com/
 */
enum PageStatus: string
{
    case unknown = 'unknown';
    case built = 'built';
    case building = 'building';
    case errored = 'errored';
}
