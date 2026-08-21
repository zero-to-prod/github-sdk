<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoDispatchRequest
{
    use DataModel;

    /** @see $event_type */
    public const event_type = 'event_type';
    #[Describe(['nullable' => true])]
    public ?string $event_type = null;

    /** @see $client_payload */
    public const client_payload = 'client_payload';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $client_payload;
}
