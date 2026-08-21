<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ApiOverviewSshKeyFingerprints
{
    use DataModel;

    /** @see $SHA256_RSA */
    public const SHA256_RSA = 'SHA256_RSA';
    #[Describe(['nullable' => true])]
    public ?string $SHA256_RSA = null;

    /** @see $SHA256_DSA */
    public const SHA256_DSA = 'SHA256_DSA';
    #[Describe(['nullable' => true])]
    public ?string $SHA256_DSA = null;

    /** @see $SHA256_ECDSA */
    public const SHA256_ECDSA = 'SHA256_ECDSA';
    #[Describe(['nullable' => true])]
    public ?string $SHA256_ECDSA = null;

    /** @see $SHA256_ED25519 */
    public const SHA256_ED25519 = 'SHA256_ED25519';
    #[Describe(['nullable' => true])]
    public ?string $SHA256_ED25519 = null;
}
