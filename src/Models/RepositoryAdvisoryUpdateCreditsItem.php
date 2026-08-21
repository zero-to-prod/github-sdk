<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class RepositoryAdvisoryUpdateCreditsItem
{
    use DataModel;

    /** @see $login */
    public const login = 'login';
    #[Describe(['nullable' => true])]
    public ?string $login = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['default' => SecurityAdvisoryCreditTypes::unknown])]
    public SecurityAdvisoryCreditTypes $type;
}
