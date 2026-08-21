<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoEnvironmentRequestReviewersItem
{
    use DataModel;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?DeploymentReviewerType $type = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;
}
