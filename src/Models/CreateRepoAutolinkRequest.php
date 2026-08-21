<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoAutolinkRequest
{
    use DataModel;

    /** @see $key_prefix */
    public const key_prefix = 'key_prefix';
    #[Describe(['nullable' => true])]
    public ?string $key_prefix = null;

    /** @see $url_template */
    public const url_template = 'url_template';
    #[Describe(['nullable' => true])]
    public ?string $url_template = null;

    /** @see $is_alphanumeric */
    public const is_alphanumeric = 'is_alphanumeric';
    #[Describe(['nullable' => true])]
    public ?bool $is_alphanumeric = null;
}
