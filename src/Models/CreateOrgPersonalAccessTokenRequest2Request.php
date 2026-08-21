<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgPersonalAccessTokenRequest2Request
{
    use DataModel;

    /** @see $action */
    public const action = 'action';
    #[Describe(['default' => CreateOrgPersonalAccessTokenRequestRequestAction::unknown])]
    public CreateOrgPersonalAccessTokenRequestRequestAction $action;

    /** @see $reason */
    public const reason = 'reason';
    #[Describe(['nullable' => true])]
    public ?string $reason = null;
}
