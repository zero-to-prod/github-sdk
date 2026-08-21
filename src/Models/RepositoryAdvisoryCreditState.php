<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The state of the user's acceptance of the credit.
 * @link https://docs.github.com/
 */
enum RepositoryAdvisoryCreditState: string
{
    case unknown = 'unknown';
    case accepted = 'accepted';
    case declined = 'declined';
    case pending = 'pending';
}
