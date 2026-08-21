<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The kind of change proposed.
 * @link https://docs.github.com/
 */
enum IssueSuggestionAction: string
{
    case unknown = 'unknown';
    case set_type = 'set_type';
    case add_label = 'add_label';
    case add_field = 'add_field';
    case add_assignee = 'add_assignee';
    case close_issue = 'close_issue';
}
