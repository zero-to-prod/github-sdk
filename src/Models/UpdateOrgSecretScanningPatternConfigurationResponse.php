<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgSecretScanningPatternConfigurationResponse
{
    use DataModel;

    /** @see $pattern_config_version */
    public const pattern_config_version = 'pattern_config_version';
    #[Describe(['nullable' => true])]
    public ?string $pattern_config_version = null;
}
