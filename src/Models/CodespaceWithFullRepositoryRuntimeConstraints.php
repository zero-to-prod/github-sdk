<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodespaceWithFullRepositoryRuntimeConstraints
{
    use DataModel;

    /** @see $allowed_port_privacy_settings */
    public const allowed_port_privacy_settings = 'allowed_port_privacy_settings';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $allowed_port_privacy_settings;
}
