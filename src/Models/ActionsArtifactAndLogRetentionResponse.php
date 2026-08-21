<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ActionsArtifactAndLogRetentionResponse
{
    use DataModel;

    /** @see $days */
    public const days = 'days';
    #[Describe(['nullable' => true])]
    public ?int $days = null;

    /** @see $maximum_allowed_days */
    public const maximum_allowed_days = 'maximum_allowed_days';
    #[Describe(['nullable' => true])]
    public ?int $maximum_allowed_days = null;
}
