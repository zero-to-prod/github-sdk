<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgPersonalAccessTokenRequestRequest
{
    use DataModel;

    /** @see $pat_request_ids */
    public const pat_request_ids = 'pat_request_ids';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $pat_request_ids;

    /** @see $action */
    public const action = 'action';
    #[Describe(['default' => CreateOrgPersonalAccessTokenRequestRequestAction::unknown])]
    public CreateOrgPersonalAccessTokenRequestRequestAction $action;

    /** @see $reason */
    public const reason = 'reason';
    #[Describe(['nullable' => true])]
    public ?string $reason = null;
}
