<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GlobalAdvisoryCreditsItem
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
}
