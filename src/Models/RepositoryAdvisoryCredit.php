<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A credit given to a user for a repository security advisory.
 * @link https://docs.github.com/
 */
class RepositoryAdvisoryCredit
{
    use DataModel;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['default' => SecurityAdvisoryCreditTypes::unknown])]
    public SecurityAdvisoryCreditTypes $type;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => RepositoryAdvisoryCreditState::unknown])]
    public RepositoryAdvisoryCreditState $state;
}
