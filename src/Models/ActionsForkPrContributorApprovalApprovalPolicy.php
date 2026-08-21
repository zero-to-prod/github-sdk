<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The policy that controls when fork PR workflows require approval from a
 * maintainer.
 * @link https://docs.github.com/
 */
enum ActionsForkPrContributorApprovalApprovalPolicy: string
{
    case unknown = 'unknown';
    case first_time_contributors_new_to_github = 'first_time_contributors_new_to_github';
    case first_time_contributors = 'first_time_contributors';
    case all_external_contributors = 'all_external_contributors';
}
