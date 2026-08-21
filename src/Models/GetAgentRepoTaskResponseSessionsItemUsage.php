<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Structured information about billing units consumed by the session.
 * @link https://docs.github.com/
 */
class GetAgentRepoTaskResponseSessionsItemUsage
{
    use DataModel;

    /** @see $type */
    public const type = 'type';
    #[Describe(['default' => GetAgentRepoTaskResponseSessionsItemUsageType::unknown])]
    public GetAgentRepoTaskResponseSessionsItemUsageType $type;

    /** @see $amount */
    public const amount = 'amount';
    #[Describe(['nullable' => true])]
    public ?float $amount = null;
}
