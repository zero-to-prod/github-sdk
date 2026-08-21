<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A Git branch reference
 * @link https://docs.github.com/
 */
class CreateAgentRepoTaskResponseArtifactsItemDataVariant2
{
    use DataModel;

    /** @see $head_ref */
    public const head_ref = 'head_ref';
    #[Describe(['nullable' => true])]
    public ?string $head_ref = null;

    /** @see $base_ref */
    public const base_ref = 'base_ref';
    #[Describe(['nullable' => true])]
    public ?string $base_ref = null;
}
