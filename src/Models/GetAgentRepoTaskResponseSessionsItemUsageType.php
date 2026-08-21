<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Billing unit used for this session. New sessions since June 1, 2026 use
 * `ai_credits`, but older sessions use `premium_requests`.
 * @link https://docs.github.com/
 */
enum GetAgentRepoTaskResponseSessionsItemUsageType: string
{
    case unknown = 'unknown';
    case ai_credits = 'ai_credits';
    case premium_requests = 'premium_requests';
}
