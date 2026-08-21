<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum ImportStatus: string
{
    case auth = 'auth';
    case error = 'error';
    case none = 'none';
    case detecting = 'detecting';
    case choose = 'choose';
    case auth_failed = 'auth_failed';
    case importing = 'importing';
    case mapping = 'mapping';
    case waiting_to_push = 'waiting_to_push';
    case pushing = 'pushing';
    case complete = 'complete';
    case setup = 'setup';
    case unknown = 'unknown';
    case detection_found_multiple = 'detection_found_multiple';
    case detection_found_nothing = 'detection_found_nothing';
    case detection_needs_auth = 'detection_needs_auth';
}
