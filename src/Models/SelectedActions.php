<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class SelectedActions
{
    use DataModel;

    /** @see $github_owned_allowed */
    public const github_owned_allowed = 'github_owned_allowed';
    #[Describe(['nullable' => true])]
    public ?bool $github_owned_allowed = null;

    /** @see $verified_allowed */
    public const verified_allowed = 'verified_allowed';
    #[Describe(['nullable' => true])]
    public ?bool $verified_allowed = null;

    /** @see $patterns_allowed */
    public const patterns_allowed = 'patterns_allowed';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $patterns_allowed;
}
