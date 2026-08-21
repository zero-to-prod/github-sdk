<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum DiscussionAnswerChosenByType: string
{
    case unknown = 'unknown';
    case Bot = 'Bot';
    case User = 'User';
    case Organization = 'Organization';
}
