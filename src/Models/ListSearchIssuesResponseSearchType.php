<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of search that was performed. Possible values are `lexical`,
 * `semantic`, or `hybrid`.
 * @link https://docs.github.com/
 */
enum ListSearchIssuesResponseSearchType: string
{
    case unknown = 'unknown';
    case lexical = 'lexical';
    case semantic = 'semantic';
    case hybrid = 'hybrid';
}
