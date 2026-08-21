<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Example partial-update body.
 * @link https://docs.github.com/
 */
class UpdateWidgetRequest
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
