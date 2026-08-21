<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class FileCommitCommitVerification
{
    use DataModel;

    /** @see $verified */
    public const verified = 'verified';
    #[Describe(['nullable' => true])]
    public ?bool $verified = null;

    /** @see $reason */
    public const reason = 'reason';
    #[Describe(['nullable' => true])]
    public ?string $reason = null;

    /** @see $signature */
    public const signature = 'signature';
    #[Describe(['nullable' => true])]
    public ?string $signature = null;

    /** @see $payload */
    public const payload = 'payload';
    #[Describe(['nullable' => true])]
    public ?string $payload = null;

    /** @see $verified_at */
    public const verified_at = 'verified_at';
    #[Describe(['nullable' => true])]
    public ?string $verified_at = null;
}
