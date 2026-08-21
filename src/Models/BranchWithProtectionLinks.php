<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BranchWithProtectionLinks
{
    use DataModel;

    /** @see $html */
    public const html = 'html';
    #[Describe(['nullable' => true])]
    public ?string $html = null;

    /** @see $self */
    public const self = 'self';
    #[Describe(['nullable' => true])]
    public ?string $self = null;
}
