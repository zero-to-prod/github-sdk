<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoPullRequest
{
    use DataModel;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $head */
    public const head = 'head';
    #[Describe(['nullable' => true])]
    public ?string $head = null;

    /** @see $head_repo */
    public const head_repo = 'head_repo';
    #[Describe(['nullable' => true])]
    public ?string $head_repo = null;

    /** @see $base */
    public const base = 'base';
    #[Describe(['nullable' => true])]
    public ?string $base = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $maintainer_can_modify */
    public const maintainer_can_modify = 'maintainer_can_modify';
    #[Describe(['nullable' => true])]
    public ?bool $maintainer_can_modify = null;

    /** @see $draft */
    public const draft = 'draft';
    #[Describe(['nullable' => true])]
    public ?bool $draft = null;

    /** @see $issue */
    public const issue = 'issue';
    #[Describe(['nullable' => true])]
    public ?int $issue = null;
}
