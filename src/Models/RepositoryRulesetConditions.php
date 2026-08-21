<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Parameters for a repository ruleset ref name condition
 * @link https://docs.github.com/
 */
class RepositoryRulesetConditions
{
    use DataModel;

    /** @see $ref_name */
    public const ref_name = 'ref_name';
    #[Describe(['nullable' => true])]
    public ?RepositoryRulesetConditionsRefName $ref_name = null;
}
