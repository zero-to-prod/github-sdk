<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ArtifactWorkflowRun
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $repository_id */
    public const repository_id = 'repository_id';
    #[Describe(['nullable' => true])]
    public ?int $repository_id = null;

    /** @see $head_repository_id */
    public const head_repository_id = 'head_repository_id';
    #[Describe(['nullable' => true])]
    public ?int $head_repository_id = null;

    /** @see $head_branch */
    public const head_branch = 'head_branch';
    #[Describe(['nullable' => true])]
    public ?string $head_branch = null;

    /** @see $head_sha */
    public const head_sha = 'head_sha';
    #[Describe(['nullable' => true])]
    public ?string $head_sha = null;
}
