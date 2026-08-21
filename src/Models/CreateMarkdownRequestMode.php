<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The rendering mode.
 * @link https://docs.github.com/
 */
enum CreateMarkdownRequestMode: string
{
    case unknown = 'unknown';
    case markdown = 'markdown';
    case gfm = 'gfm';
}
