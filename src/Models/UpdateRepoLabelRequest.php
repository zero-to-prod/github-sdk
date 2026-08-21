<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoLabelRequest
{
    use DataModel;

    /** @see $new_name */
    public const new_name = 'new_name';
    #[Describe(['nullable' => true])]
    public ?string $new_name = null;

    /** @see $color */
    public const color = 'color';
    #[Describe(['nullable' => true])]
    public ?string $color = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;
}
