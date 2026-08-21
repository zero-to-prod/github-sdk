<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum ListSearchIssuesResponseLexicalFallbackReasonItem: string
{
    case unknown = 'unknown';
    case no_text_terms = 'no_text_terms';
    case quoted_text = 'quoted_text';
    case non_issue_target = 'non_issue_target';
    case or_boolean_not_supported = 'or_boolean_not_supported';
    case no_accessible_repos = 'no_accessible_repos';
    case server_error = 'server_error';
    case only_non_semantic_fields_requested = 'only_non_semantic_fields_requested';
    case service_unavailable = 'service_unavailable';
}
