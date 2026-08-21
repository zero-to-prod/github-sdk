<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A workflow referenced/reused by the initial caller workflow
 * @link https://docs.github.com/
 */
class ReferencedWorkflow
{
    use DataModel;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;
}
