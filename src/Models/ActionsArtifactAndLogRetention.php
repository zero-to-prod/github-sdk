<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ActionsArtifactAndLogRetention
{
    use DataModel;

    /** @see $days */
    public const days = 'days';
    #[Describe(['nullable' => true])]
    public ?int $days = null;
}
