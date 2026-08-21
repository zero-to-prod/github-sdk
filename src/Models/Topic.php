<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A topic aggregates entities that are related to a subject.
 * @link https://docs.github.com/
 */
class Topic
{
    use DataModel;

    /** @see $names */
    public const names = 'names';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $names;
}
