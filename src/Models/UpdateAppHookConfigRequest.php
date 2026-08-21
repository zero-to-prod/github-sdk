<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateAppHookConfigRequest
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $content_type */
    public const content_type = 'content_type';
    #[Describe(['nullable' => true])]
    public ?string $content_type = null;

    /** @see $secret */
    public const secret = 'secret';
    #[Describe(['nullable' => true])]
    public ?string $secret = null;

    /** @see $insecure_ssl */
    public const insecure_ssl = 'insecure_ssl';
    #[Describe(['nullable' => true])]
    public string|float|null $insecure_ssl = null;
}
