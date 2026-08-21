<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A unique encryption key
 * @link https://docs.github.com/
 */
class GpgKey
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $primary_key_id */
    public const primary_key_id = 'primary_key_id';
    #[Describe(['nullable' => true])]
    public ?int $primary_key_id = null;

    /** @see $key_id */
    public const key_id = 'key_id';
    #[Describe(['nullable' => true])]
    public ?string $key_id = null;

    /** @see $public_key */
    public const public_key = 'public_key';
    #[Describe(['nullable' => true])]
    public ?string $public_key = null;

    /** @see $emails */
    public const emails = 'emails';
    /** @var array<int, GpgKeyEmailsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => GpgKeyEmailsItem::class,
        'default' => [],
    ])]
    public array $emails;

    /** @see $subkeys */
    public const subkeys = 'subkeys';
    /** @var array<int, GpgKeySubkeysItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => GpgKeySubkeysItem::class,
        'default' => [],
    ])]
    public array $subkeys;

    /** @see $can_sign */
    public const can_sign = 'can_sign';
    #[Describe(['nullable' => true])]
    public ?bool $can_sign = null;

    /** @see $can_encrypt_comms */
    public const can_encrypt_comms = 'can_encrypt_comms';
    #[Describe(['nullable' => true])]
    public ?bool $can_encrypt_comms = null;

    /** @see $can_encrypt_storage */
    public const can_encrypt_storage = 'can_encrypt_storage';
    #[Describe(['nullable' => true])]
    public ?bool $can_encrypt_storage = null;

    /** @see $can_certify */
    public const can_certify = 'can_certify';
    #[Describe(['nullable' => true])]
    public ?bool $can_certify = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $expires_at */
    public const expires_at = 'expires_at';
    #[Describe(['nullable' => true])]
    public ?string $expires_at = null;

    /** @see $revoked */
    public const revoked = 'revoked';
    #[Describe(['nullable' => true])]
    public ?bool $revoked = null;

    /** @see $raw_key */
    public const raw_key = 'raw_key';
    #[Describe(['nullable' => true])]
    public ?string $raw_key = null;
}
