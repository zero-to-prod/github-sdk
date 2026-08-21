<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of resource.
 * @link https://docs.github.com/
 */
enum CopilotSpaceResourcesAttributesItemResourceType: string
{
    case unknown = 'unknown';
    case repository = 'repository';
    case github_file = 'github_file';
    case free_text = 'free_text';
    case github_issue = 'github_issue';
    case github_pull_request = 'github_pull_request';
    case media_content = 'media_content';
    case uploaded_text_file = 'uploaded_text_file';
}
