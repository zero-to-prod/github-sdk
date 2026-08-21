<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum ContentFileType: string
{
    case unknown = 'unknown';
    case file = 'file';
}
