<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Details about the codespace's git repository.
 * @link https://docs.github.com/
 */
class CodespaceGitStatus
{
    use DataModel;

    /** @see $ahead */
    public const ahead = 'ahead';
    #[Describe(['nullable' => true])]
    public ?int $ahead = null;

    /** @see $behind */
    public const behind = 'behind';
    #[Describe(['nullable' => true])]
    public ?int $behind = null;

    /** @see $has_unpushed_changes */
    public const has_unpushed_changes = 'has_unpushed_changes';
    #[Describe(['nullable' => true])]
    public ?bool $has_unpushed_changes = null;

    /** @see $has_uncommitted_changes */
    public const has_uncommitted_changes = 'has_uncommitted_changes';
    #[Describe(['nullable' => true])]
    public ?bool $has_uncommitted_changes = null;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;
}
