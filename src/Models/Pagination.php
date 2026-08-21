<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Pagination metadata emitted under `data.Pagination` on paginated responses.
 * @link https://docs.github.com/
 */
class Pagination
{
    use DataModel;

    /** @see $current_page */
    public const current_page = 'current_page';
    /** @see $last_page */
    public const last_page = 'last_page';
    /** @see $per_page */
    public const per_page = 'per_page';
    /** @see $total */
    public const total = 'total';
    /** @see $next_page_url */
    public const next_page_url = 'next_page_url';
    /** @see $prev_page_url */
    public const prev_page_url = 'prev_page_url';

    #[Describe(['nullable' => true])]
    public ?int $current_page = null;
    #[Describe(['nullable' => true])]
    public ?int $last_page = null;
    #[Describe(['nullable' => true])]
    public ?int $per_page = null;
    #[Describe(['nullable' => true])]
    public ?int $total = null;
    #[Describe(['nullable' => true])]
    public ?string $next_page_url = null;
    #[Describe(['nullable' => true])]
    public ?string $prev_page_url = null;
}
