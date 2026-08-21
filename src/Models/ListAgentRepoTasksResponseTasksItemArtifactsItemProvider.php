<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Provider namespace
 * @link https://docs.github.com/
 */
enum ListAgentRepoTasksResponseTasksItemArtifactsItemProvider: string
{
    case unknown = 'unknown';
    case github = 'github';
}
