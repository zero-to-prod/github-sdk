<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Metadata for a Git tag
 * @link https://docs.github.com/
 */
class GitTag
{
    use DataModel;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $tag */
    public const tag = 'tag';
    #[Describe(['nullable' => true])]
    public ?string $tag = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @see $tagger */
    public const tagger = 'tagger';
    #[Describe(['nullable' => true])]
    public ?GitTagTagger $tagger = null;

    /** @see $object */
    public const object = 'object';
    #[Describe(['nullable' => true])]
    public ?GitTagObject $object = null;

    /** @see $verification */
    public const verification = 'verification';
    #[Describe(['nullable' => true])]
    public ?Verification $verification = null;
}
