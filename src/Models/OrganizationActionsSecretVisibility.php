<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Visibility of a secret
 * @link https://docs.github.com/
 */
enum OrganizationActionsSecretVisibility: string
{
    case unknown = 'unknown';
    case all = 'all';
    case private = 'private';
    case selected = 'selected';
}
