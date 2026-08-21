<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgAgentVariablesResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $variables */
    public const variables = 'variables';
    /** @var array<int, OrganizationActionsVariable> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => OrganizationActionsVariable::class,
        'default' => [],
    ])]
    public array $variables;
}
