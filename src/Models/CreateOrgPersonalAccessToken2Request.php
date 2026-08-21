<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgPersonalAccessToken2Request
{
    use DataModel;

    /** @see $action */
    public const action = 'action';
    #[Describe(['default' => CreateOrgPersonalAccessTokenRequestAction::unknown])]
    public CreateOrgPersonalAccessTokenRequestAction $action;
}
