<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Permission check result for a given devcontainer config.
 * @link https://docs.github.com/
 */
class CodespacesPermissionsCheckForDevcontainer
{
    use DataModel;

    /** @see $accepted */
    public const accepted = 'accepted';
    #[Describe(['nullable' => true])]
    public ?bool $accepted = null;
}
