<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The color of the issue type.
 * @link https://docs.github.com/
 */
enum IssueTypeColor: string
{
    case unknown = 'unknown';
    case gray = 'gray';
    case blue = 'blue';
    case green = 'green';
    case yellow = 'yellow';
    case orange = 'orange';
    case red = 'red';
    case pink = 'pink';
    case purple = 'purple';
}
