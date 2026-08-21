<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Type of the task creator
 * @link https://docs.github.com/
 */
enum ListAgentRepoTasksResponseTasksItemCreatorType: string
{
    case unknown = 'unknown';
    case user = 'user';
    case organization = 'organization';
}
