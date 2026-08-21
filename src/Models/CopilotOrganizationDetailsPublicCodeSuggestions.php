<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The organization policy for allowing or blocking suggestions matching
 * public code (duplication detection filter).
 * @link https://docs.github.com/
 */
enum CopilotOrganizationDetailsPublicCodeSuggestions: string
{
    case unknown = 'unknown';
    case allow = 'allow';
    case block = 'block';
    case unconfigured = 'unconfigured';
}
