<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Request to install an integration on a target
 * @link https://docs.github.com/
 */
class IntegrationInstallationRequest
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $account */
    public const account = 'account';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $account;

    /** @see $requester */
    public const requester = 'requester';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $requester = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;
}
