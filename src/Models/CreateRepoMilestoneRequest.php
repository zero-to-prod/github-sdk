<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoMilestoneRequest
{
    use DataModel;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?NullableMilestoneState $state = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $due_on */
    public const due_on = 'due_on';
    #[Describe(['nullable' => true])]
    public ?string $due_on = null;
}
