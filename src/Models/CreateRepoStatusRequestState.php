<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The state of the status.
 * @link https://docs.github.com/
 */
enum CreateRepoStatusRequestState: string
{
    case unknown = 'unknown';
    case error = 'error';
    case failure = 'failure';
    case pending = 'pending';
    case success = 'success';
}
