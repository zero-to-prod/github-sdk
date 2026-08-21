<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The state of the advisory.
 * @link https://docs.github.com/
 */
enum RepositoryAdvisoryState: string
{
    case unknown = 'unknown';
    case published = 'published';
    case closed = 'closed';
    case withdrawn = 'withdrawn';
    case draft = 'draft';
    case triage = 'triage';
}
