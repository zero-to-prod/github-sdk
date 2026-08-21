<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of credit the user is receiving.
 * @link https://docs.github.com/
 */
enum SecurityAdvisoryCreditTypes: string
{
    case unknown = 'unknown';
    case analyst = 'analyst';
    case finder = 'finder';
    case reporter = 'reporter';
    case coordinator = 'coordinator';
    case remediation_developer = 'remediation_developer';
    case remediation_reviewer = 'remediation_reviewer';
    case remediation_verifier = 'remediation_verifier';
    case tool = 'tool';
    case sponsor = 'sponsor';
    case other = 'other';
}
