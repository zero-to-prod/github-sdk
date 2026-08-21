<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Whether this rule targets a branch or tag.
 * @link https://docs.github.com/
 */
enum DeploymentBranchPolicyType: string
{
    case unknown = 'unknown';
    case branch = 'branch';
    case tag = 'tag';
}
