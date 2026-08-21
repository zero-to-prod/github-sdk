<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class SecretScanningLocation
{
    use DataModel;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?SecretScanningLocationType $type = null;

    /** @see $details */
    public const details = 'details';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $details;
}
