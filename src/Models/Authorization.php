<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The authorization for an OAuth app, GitHub App, or a Personal Access
 * Token.
 * @link https://docs.github.com/
 */
class Authorization
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $scopes */
    public const scopes = 'scopes';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $scopes;

    /** @see $token */
    public const token = 'token';
    #[Describe(['nullable' => true])]
    public ?string $token = null;

    /** @see $token_last_eight */
    public const token_last_eight = 'token_last_eight';
    #[Describe(['nullable' => true])]
    public ?string $token_last_eight = null;

    /** @see $hashed_token */
    public const hashed_token = 'hashed_token';
    #[Describe(['nullable' => true])]
    public ?string $hashed_token = null;

    /** @see $app */
    public const app = 'app';
    #[Describe(['nullable' => true])]
    public ?AuthorizationApp $app = null;

    /** @see $note */
    public const note = 'note';
    #[Describe(['nullable' => true])]
    public ?string $note = null;

    /** @see $note_url */
    public const note_url = 'note_url';
    #[Describe(['nullable' => true])]
    public ?string $note_url = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $fingerprint */
    public const fingerprint = 'fingerprint';
    #[Describe(['nullable' => true])]
    public ?string $fingerprint = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;

    /** @see $installation */
    public const installation = 'installation';
    #[Describe(['nullable' => true])]
    public ?NullableScopedInstallation $installation = null;

    /** @see $expires_at */
    public const expires_at = 'expires_at';
    #[Describe(['nullable' => true])]
    public ?string $expires_at = null;
}
