<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoGitTagRequest
{
    use DataModel;

    /** @see $tag */
    public const tag = 'tag';
    #[Describe(['nullable' => true])]
    public ?string $tag = null;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @see $object */
    public const object = 'object';
    #[Describe(['nullable' => true])]
    public ?string $object = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['default' => CreateRepoGitTagRequestType::unknown])]
    public CreateRepoGitTagRequestType $type;

    /** @see $tagger */
    public const tagger = 'tagger';
    #[Describe(['nullable' => true])]
    public ?CreateRepoGitTagRequestTagger $tagger = null;
}
