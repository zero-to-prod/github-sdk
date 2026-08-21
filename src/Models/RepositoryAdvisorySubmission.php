<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class RepositoryAdvisorySubmission
{
    use DataModel;

    /** @see $accepted */
    public const accepted = 'accepted';
    #[Describe(['nullable' => true])]
    public ?bool $accepted = null;
}
