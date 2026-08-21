<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateUserCodespaceRequest
{
    use DataModel;

    /** @see $machine */
    public const machine = 'machine';
    #[Describe(['nullable' => true])]
    public ?string $machine = null;

    /** @see $display_name */
    public const display_name = 'display_name';
    #[Describe(['nullable' => true])]
    public ?string $display_name = null;

    /** @see $recent_folders */
    public const recent_folders = 'recent_folders';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $recent_folders;
}
