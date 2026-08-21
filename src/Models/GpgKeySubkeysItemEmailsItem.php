<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GpgKeySubkeysItemEmailsItem
{
    use DataModel;

    /** @see $email */
    public const email = 'email';
    #[Describe(['nullable' => true])]
    public ?string $email = null;

    /** @see $verified */
    public const verified = 'verified';
    #[Describe(['nullable' => true])]
    public ?bool $verified = null;
}
