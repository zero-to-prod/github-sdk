<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The GitHub Pages deployment status.
 * @link https://docs.github.com/
 */
class PageDeployment
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public int|string|null $id = null;

    /** @see $status_url */
    public const status_url = 'status_url';
    #[Describe(['nullable' => true])]
    public ?string $status_url = null;

    /** @see $page_url */
    public const page_url = 'page_url';
    #[Describe(['nullable' => true])]
    public ?string $page_url = null;

    /** @see $preview_url */
    public const preview_url = 'preview_url';
    #[Describe(['nullable' => true])]
    public ?string $preview_url = null;
}
