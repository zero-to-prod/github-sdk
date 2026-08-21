<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class EnvironmentProtectionRulesItemVariant2ReviewersItem
{
    use DataModel;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?DeploymentReviewerType $type = null;

    /** @see $reviewer */
    public const reviewer = 'reviewer';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $reviewer;
}
