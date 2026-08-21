<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The reason for locking the issue or pull request conversation. Lock will
 * fail if you don't use one of these reasons: * `off-topic` * `too heated` *
 * `resolved` * `spam`
 * @link https://docs.github.com/
 */
enum UpdateRepoIssueLockRequestLockReason: string
{
    case unknown = 'unknown';
    case off_topic = 'off-topic';
    case too_heated = 'too heated';
    case resolved = 'resolved';
    case spam = 'spam';
}
