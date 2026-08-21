<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GlobalAdvisoryCwesItem
{
    use DataModel;

    /** @see $cwe_id */
    public const cwe_id = 'cwe_id';
    #[Describe(['nullable' => true])]
    public ?string $cwe_id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;
}
