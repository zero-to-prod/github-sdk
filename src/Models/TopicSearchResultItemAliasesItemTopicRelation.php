<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class TopicSearchResultItemAliasesItemTopicRelation
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $topic_id */
    public const topic_id = 'topic_id';
    #[Describe(['nullable' => true])]
    public ?int $topic_id = null;

    /** @see $relation_type */
    public const relation_type = 'relation_type';
    #[Describe(['nullable' => true])]
    public ?string $relation_type = null;
}
