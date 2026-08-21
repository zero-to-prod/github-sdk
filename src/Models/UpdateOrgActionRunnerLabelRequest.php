<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgActionRunnerLabelRequest
{
    use DataModel;

    /** @see $labels */
    public const labels = 'labels';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $labels;
}
