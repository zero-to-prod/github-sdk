<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Source answers the question, "where did this role come from?"
 * @link https://docs.github.com/
 */
enum OrganizationRoleSource: string
{
    case unknown = 'unknown';
    case Organization = 'Organization';
    case Enterprise = 'Enterprise';
    case Predefined = 'Predefined';
}
