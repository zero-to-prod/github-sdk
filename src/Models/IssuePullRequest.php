<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class IssuePullRequest
{
    use DataModel;

    /** @see $merged_at */
    public const merged_at = 'merged_at';
    #[Describe(['nullable' => true])]
    public ?string $merged_at = null;

    /** @see $diff_url */
    public const diff_url = 'diff_url';
    #[Describe(['nullable' => true])]
    public ?string $diff_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $patch_url */
    public const patch_url = 'patch_url';
    #[Describe(['nullable' => true])]
    public ?string $patch_url = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;
}
