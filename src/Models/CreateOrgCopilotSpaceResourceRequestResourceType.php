<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of resource to create.
 * @link https://docs.github.com/
 */
enum CreateOrgCopilotSpaceResourceRequestResourceType: string
{
    case unknown = 'unknown';
    case repository = 'repository';
    case github_file = 'github_file';
    case free_text = 'free_text';
    case github_issue = 'github_issue';
    case github_pull_request = 'github_pull_request';
}
