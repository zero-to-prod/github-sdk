<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Issue Event Label
 * @link https://docs.github.com/
 */
class IssueEventLabel
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $color */
    public const color = 'color';
    #[Describe(['nullable' => true])]
    public ?string $color = null;
}
