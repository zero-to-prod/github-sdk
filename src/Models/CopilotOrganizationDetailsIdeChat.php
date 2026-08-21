<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The organization policy for allowing or disallowing Copilot Chat in the
 * IDE.
 * @link https://docs.github.com/
 */
enum CopilotOrganizationDetailsIdeChat: string
{
    case unknown = 'unknown';
    case enabled = 'enabled';
    case disabled = 'disabled';
    case unconfigured = 'unconfigured';
}
