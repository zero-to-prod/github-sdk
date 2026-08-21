<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DeleteOrgCodeSecurityConfigurationDetachRequest
{
    use DataModel;

    /** @see $selected_repository_ids */
    public const selected_repository_ids = 'selected_repository_ids';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $selected_repository_ids;
}
