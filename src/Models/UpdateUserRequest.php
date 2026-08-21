<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateUserRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $email */
    public const email = 'email';
    #[Describe(['nullable' => true])]
    public ?string $email = null;

    /** @see $blog */
    public const blog = 'blog';
    #[Describe(['nullable' => true])]
    public ?string $blog = null;

    /** @see $twitter_username */
    public const twitter_username = 'twitter_username';
    #[Describe(['nullable' => true])]
    public ?string $twitter_username = null;

    /** @see $company */
    public const company = 'company';
    #[Describe(['nullable' => true])]
    public ?string $company = null;

    /** @see $location */
    public const location = 'location';
    #[Describe(['nullable' => true])]
    public ?string $location = null;

    /** @see $hireable */
    public const hireable = 'hireable';
    #[Describe(['nullable' => true])]
    public ?bool $hireable = null;

    /** @see $bio */
    public const bio = 'bio';
    #[Describe(['nullable' => true])]
    public ?string $bio = null;
}
