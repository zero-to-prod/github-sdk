<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoPullReviewRequest
{
    use DataModel;

    /** @see $commit_id */
    public const commit_id = 'commit_id';
    #[Describe(['nullable' => true])]
    public ?string $commit_id = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $event */
    public const event = 'event';
    #[Describe(['nullable' => true])]
    public ?CreateRepoPullReviewRequestEvent $event = null;

    /** @see $comments */
    public const comments = 'comments';
    /** @var array<int, CreateRepoPullReviewRequestCommentsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CreateRepoPullReviewRequestCommentsItem::class,
        'default' => [],
    ])]
    public array $comments;
}
