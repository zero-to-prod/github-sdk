<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoReleaseRequest
{
    use DataModel;

    /** @see $tag_name */
    public const tag_name = 'tag_name';
    #[Describe(['nullable' => true])]
    public ?string $tag_name = null;

    /** @see $target_commitish */
    public const target_commitish = 'target_commitish';
    #[Describe(['nullable' => true])]
    public ?string $target_commitish = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $draft */
    public const draft = 'draft';
    #[Describe(['nullable' => true])]
    public ?bool $draft = null;

    /** @see $prerelease */
    public const prerelease = 'prerelease';
    #[Describe(['nullable' => true])]
    public ?bool $prerelease = null;

    /** @see $discussion_category_name */
    public const discussion_category_name = 'discussion_category_name';
    #[Describe(['nullable' => true])]
    public ?string $discussion_category_name = null;

    /** @see $generate_release_notes */
    public const generate_release_notes = 'generate_release_notes';
    #[Describe(['nullable' => true])]
    public ?bool $generate_release_notes = null;

    /** @see $make_latest */
    public const make_latest = 'make_latest';
    #[Describe(['nullable' => true])]
    public ?CreateRepoReleaseRequestMakeLatest $make_latest = null;
}
