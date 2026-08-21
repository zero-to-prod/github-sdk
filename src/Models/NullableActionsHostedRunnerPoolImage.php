<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Provides details of a hosted runner image
 * @link https://docs.github.com/
 */
class NullableActionsHostedRunnerPoolImage
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $size_gb */
    public const size_gb = 'size_gb';
    #[Describe(['nullable' => true])]
    public ?int $size_gb = null;

    /** @see $display_name */
    public const display_name = 'display_name';
    #[Describe(['nullable' => true])]
    public ?string $display_name = null;

    /** @see $source */
    public const source = 'source';
    #[Describe(['default' => NullableActionsHostedRunnerPoolImageSource::unknown])]
    public NullableActionsHostedRunnerPoolImageSource $source;

    /** @see $version */
    public const version = 'version';
    #[Describe(['nullable' => true])]
    public ?string $version = null;
}
