<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The historical version of a ruleset
 * @link https://docs.github.com/
 */
class RulesetVersion
{
    use DataModel;

    /** @see $version_id */
    public const version_id = 'version_id';
    #[Describe(['nullable' => true])]
    public ?int $version_id = null;

    /** @see $actor */
    public const actor = 'actor';
    #[Describe(['nullable' => true])]
    public ?RulesetVersionActor $actor = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
