<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The EPSS scores as calculated by the [Exploit Prediction Scoring
 * System](https://www.first.org/epss).
 * @link https://docs.github.com/
 */
class SecurityAdvisoryEpss
{
    use DataModel;

    /** @see $percentage */
    public const percentage = 'percentage';
    #[Describe(['nullable' => true])]
    public ?float $percentage = null;

    /** @see $percentile */
    public const percentile = 'percentile';
    #[Describe(['nullable' => true])]
    public ?float $percentile = null;
}
