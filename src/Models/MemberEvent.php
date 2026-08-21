<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class MemberEvent
{
    use DataModel;

    /** @see $action */
    public const action = 'action';
    #[Describe(['nullable' => true])]
    public ?string $action = null;

    /** @see $member */
    public const member = 'member';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $member = null;
}
