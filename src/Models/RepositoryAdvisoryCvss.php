<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class RepositoryAdvisoryCvss
{
    use DataModel;

    /** @see $vector_string */
    public const vector_string = 'vector_string';
    #[Describe(['nullable' => true])]
    public ?string $vector_string = null;

    /** @see $score */
    public const score = 'score';
    #[Describe(['nullable' => true])]
    public ?float $score = null;
}
