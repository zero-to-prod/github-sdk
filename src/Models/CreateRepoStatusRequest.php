<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoStatusRequest
{
    use DataModel;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => CreateRepoStatusRequestState::unknown])]
    public CreateRepoStatusRequestState $state;

    /** @see $target_url */
    public const target_url = 'target_url';
    #[Describe(['nullable' => true])]
    public ?string $target_url = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $context */
    public const context = 'context';
    #[Describe(['nullable' => true])]
    public ?string $context = null;
}
