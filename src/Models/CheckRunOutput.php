<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CheckRunOutput
{
    use DataModel;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $summary */
    public const summary = 'summary';
    #[Describe(['nullable' => true])]
    public ?string $summary = null;

    /** @see $text */
    public const text = 'text';
    #[Describe(['nullable' => true])]
    public ?string $text = null;

    /** @see $annotations_count */
    public const annotations_count = 'annotations_count';
    #[Describe(['nullable' => true])]
    public ?int $annotations_count = null;

    /** @see $annotations_url */
    public const annotations_url = 'annotations_url';
    #[Describe(['nullable' => true])]
    public ?string $annotations_url = null;
}
