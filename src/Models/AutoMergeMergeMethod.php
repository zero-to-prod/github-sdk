<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The merge method to use.
 * @link https://docs.github.com/
 */
enum AutoMergeMergeMethod: string
{
    case unknown = 'unknown';
    case merge = 'merge';
    case squash = 'squash';
    case rebase = 'rebase';
}
