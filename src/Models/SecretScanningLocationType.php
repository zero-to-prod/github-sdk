<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The location type. Because secrets may be found in different types of
 * resources (ie. code, comments, issues, pull requests, discussions), this
 * field identifies the type of resource where the secret was found.
 * @link https://docs.github.com/
 */
enum SecretScanningLocationType: string
{
    case unknown = 'unknown';
    case commit = 'commit';
    case wiki_commit = 'wiki_commit';
    case issue_title = 'issue_title';
    case issue_body = 'issue_body';
    case issue_comment = 'issue_comment';
    case discussion_title = 'discussion_title';
    case discussion_body = 'discussion_body';
    case discussion_comment = 'discussion_comment';
    case pull_request_title = 'pull_request_title';
    case pull_request_body = 'pull_request_body';
    case pull_request_comment = 'pull_request_comment';
    case pull_request_review = 'pull_request_review';
    case pull_request_review_comment = 'pull_request_review_comment';
}
