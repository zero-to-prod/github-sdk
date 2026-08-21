<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Information about the current page.
 * @link https://docs.github.com/
 */
class CreateOrgAttestationBulkListResponsePageInfo
{
    use DataModel;

    /** @see $has_next */
    public const has_next = 'has_next';
    #[Describe(['nullable' => true])]
    public ?bool $has_next = null;

    /** @see $has_previous */
    public const has_previous = 'has_previous';
    #[Describe(['nullable' => true])]
    public ?bool $has_previous = null;

    /** @see $next */
    public const next = 'next';
    #[Describe(['nullable' => true])]
    public ?string $next = null;

    /** @see $previous */
    public const previous = 'previous';
    #[Describe(['nullable' => true])]
    public ?string $previous = null;
}
