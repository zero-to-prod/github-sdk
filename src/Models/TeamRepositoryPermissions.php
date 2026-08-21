<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class TeamRepositoryPermissions
{
    use DataModel;

    /** @see $admin */
    public const admin = 'admin';
    #[Describe(['nullable' => true])]
    public ?bool $admin = null;

    /** @see $pull */
    public const pull = 'pull';
    #[Describe(['nullable' => true])]
    public ?bool $pull = null;

    /** @see $triage */
    public const triage = 'triage';
    #[Describe(['nullable' => true])]
    public ?bool $triage = null;

    /** @see $push */
    public const push = 'push';
    #[Describe(['nullable' => true])]
    public ?bool $push = null;

    /** @see $maintain */
    public const maintain = 'maintain';
    #[Describe(['nullable' => true])]
    public ?bool $maintain = null;
}
