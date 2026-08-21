<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The suggestion's lifecycle state.
 * @link https://docs.github.com/
 */
enum IssueSuggestionState: string
{
    case unknown = 'unknown';
    case pending = 'pending';
    case applied = 'applied';
    case approved = 'approved';
    case dismissed = 'dismissed';
    case replaced = 'replaced';
    case invalidated = 'invalidated';
}
