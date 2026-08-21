<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The attestation's Sigstore Bundle. Refer to the [Sigstore Bundle
 * Specification](https://github.com/sigstore/protobuf-specs/blob/main/protos/sigstore_bundle.proto)
 * for more information.
 * @link https://docs.github.com/
 */
class GetRepoAttestationResponseAttestationsItemBundle
{
    use DataModel;

    /** @see $mediaType */
    public const mediaType = 'mediaType';
    #[Describe(['nullable' => true])]
    public ?string $mediaType = null;

    /** @see $verificationMaterial */
    public const verificationMaterial = 'verificationMaterial';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $verificationMaterial;

    /** @see $dsseEnvelope */
    public const dsseEnvelope = 'dsseEnvelope';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $dsseEnvelope;
}
