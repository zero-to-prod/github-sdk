<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The level of privacy this team should have
 * @link https://docs.github.com/
 */
enum TeamFullPrivacy: string
{
    case unknown = 'unknown';
    case closed = 'closed';
    case secret = 'secret';
}
