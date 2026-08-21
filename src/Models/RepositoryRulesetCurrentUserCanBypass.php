<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The bypass type of the user making the API request for this ruleset. This
 * field is only returned when querying the repository-level endpoint.
 * @link https://docs.github.com/
 */
enum RepositoryRulesetCurrentUserCanBypass: string
{
    case unknown = 'unknown';
    case always = 'always';
    case pull_requests_only = 'pull_requests_only';
    case never = 'never';
    case exempt = 'exempt';
}
