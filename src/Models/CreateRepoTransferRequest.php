<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoTransferRequest
{
    use DataModel;

    /** @see $new_owner */
    public const new_owner = 'new_owner';
    #[Describe(['nullable' => true])]
    public ?string $new_owner = null;

    /** @see $new_name */
    public const new_name = 'new_name';
    #[Describe(['nullable' => true])]
    public ?string $new_name = null;

    /** @see $team_ids */
    public const team_ids = 'team_ids';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $team_ids;
}
