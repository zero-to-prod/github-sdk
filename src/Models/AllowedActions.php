<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The permissions policy that controls the actions and reusable workflows
 * that are allowed to run.
 * @link https://docs.github.com/
 */
enum AllowedActions: string
{
    case unknown = 'unknown';
    case all = 'all';
    case local_only = 'local_only';
    case selected = 'selected';
}
