<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The state if the domain is verified
 * @link https://docs.github.com/
 */
enum PageProtectedDomainState: string
{
    case unknown = 'unknown';
    case pending = 'pending';
    case verified = 'verified';
    case unverified = 'unverified';
}
