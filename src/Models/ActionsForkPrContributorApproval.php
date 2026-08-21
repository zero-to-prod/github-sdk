<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ActionsForkPrContributorApproval
{
    use DataModel;

    /** @see $approval_policy */
    public const approval_policy = 'approval_policy';
    #[Describe(['default' => ActionsForkPrContributorApprovalApprovalPolicy::unknown])]
    public ActionsForkPrContributorApprovalApprovalPolicy $approval_policy;
}
