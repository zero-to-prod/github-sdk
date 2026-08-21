<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class TopicSearchResultItemAliasesItem
{
    use DataModel;

    /** @see $topic_relation */
    public const topic_relation = 'topic_relation';
    #[Describe(['nullable' => true])]
    public ?TopicSearchResultItemAliasesItemTopicRelation $topic_relation = null;
}
