<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgPersonalAccessTokenRequest
{
    use DataModel;

    /** @see $action */
    public const action = 'action';
    #[Describe(['default' => CreateOrgPersonalAccessTokenRequestAction::unknown])]
    public CreateOrgPersonalAccessTokenRequestAction $action;

    /** @see $pat_ids */
    public const pat_ids = 'pat_ids';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $pat_ids;
}
