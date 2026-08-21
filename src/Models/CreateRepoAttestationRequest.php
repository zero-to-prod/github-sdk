<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoAttestationRequest
{
    use DataModel;

    /** @see $bundle */
    public const bundle = 'bundle';
    #[Describe(['nullable' => true])]
    public ?CreateRepoAttestationRequestBundle $bundle = null;
}
