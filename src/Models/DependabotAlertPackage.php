<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Details for the vulnerable package.
 * @link https://docs.github.com/
 */
class DependabotAlertPackage
{
    use DataModel;

    /** @see $ecosystem */
    public const ecosystem = 'ecosystem';
    #[Describe(['nullable' => true])]
    public ?string $ecosystem = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;
}
