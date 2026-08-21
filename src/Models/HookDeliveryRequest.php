<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class HookDeliveryRequest
{
    use DataModel;

    /** @see $headers */
    public const headers = 'headers';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $headers;

    /** @see $payload */
    public const payload = 'payload';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $payload;
}
