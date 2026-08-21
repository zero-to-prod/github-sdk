<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Email
 * @link https://docs.github.com/
 */
class Email
{
    use DataModel;

    /** @see $email */
    public const email = 'email';
    #[Describe(['nullable' => true])]
    public ?string $email = null;

    /** @see $primary */
    public const primary = 'primary';
    #[Describe(['nullable' => true])]
    public ?bool $primary = null;

    /** @see $verified */
    public const verified = 'verified';
    #[Describe(['nullable' => true])]
    public ?bool $verified = null;

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['nullable' => true])]
    public ?string $visibility = null;
}
