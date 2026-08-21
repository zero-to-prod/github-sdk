<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Who can edit the values of the property
 * @link https://docs.github.com/
 */
enum CustomPropertyValuesEditableBy: string
{
    case unknown = 'unknown';
    case org_actors = 'org_actors';
    case org_and_repo_actors = 'org_and_repo_actors';
}
