<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class RepositoryRulesetConditionsRefName
{
    use DataModel;

    /** @see $include */
    public const include = 'include';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $include;

    /** @see $exclude */
    public const exclude = 'exclude';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $exclude;
}
