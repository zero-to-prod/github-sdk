<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The Copilot plan of the organization, or the parent enterprise, when
 * applicable.
 * @link https://docs.github.com/
 */
enum CopilotOrganizationDetailsPlanType: string
{
    case unknown = 'unknown';
    case business = 'business';
    case enterprise = 'enterprise';
}
