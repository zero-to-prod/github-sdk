<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Example request body. Only set properties are serialized, so a nullable
 * default keeps an untouched field out of the payload.
 * @link https://docs.github.com/
 */
class CreateWidgetRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?WidgetStatus $status = null;
}
