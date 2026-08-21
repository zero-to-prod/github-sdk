<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Information about an active dismissal request for this Dependabot alert.
 * @link https://docs.github.com/
 */
class DependabotAlertDismissalRequestSimple
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertDismissalRequestSimpleStatus $status = null;

    /** @see $requester */
    public const requester = 'requester';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertDismissalRequestSimpleRequester $requester = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;
}
