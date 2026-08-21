<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class RepositoryAdvisoryIdentifiersItem
{
    use DataModel;

    /** @see $type */
    public const type = 'type';
    #[Describe(['default' => GlobalAdvisoryIdentifiersItemType::unknown])]
    public GlobalAdvisoryIdentifiersItemType $type;

    /** @see $value */
    public const value = 'value';
    #[Describe(['nullable' => true])]
    public ?string $value = null;
}
