<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Type of artifact. Available Values: `pull`, `branch`.
 * @link https://docs.github.com/
 */
enum ListAgentRepoTasksResponseTasksItemArtifactsItemType: string
{
    case unknown = 'unknown';
    case pull = 'pull';
    case branch = 'branch';
}
