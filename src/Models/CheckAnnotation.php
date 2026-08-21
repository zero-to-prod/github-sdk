<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Check Annotation
 * @link https://docs.github.com/
 */
class CheckAnnotation
{
    use DataModel;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $start_line */
    public const start_line = 'start_line';
    #[Describe(['nullable' => true])]
    public ?int $start_line = null;

    /** @see $end_line */
    public const end_line = 'end_line';
    #[Describe(['nullable' => true])]
    public ?int $end_line = null;

    /** @see $start_column */
    public const start_column = 'start_column';
    #[Describe(['nullable' => true])]
    public ?int $start_column = null;

    /** @see $end_column */
    public const end_column = 'end_column';
    #[Describe(['nullable' => true])]
    public ?int $end_column = null;

    /** @see $annotation_level */
    public const annotation_level = 'annotation_level';
    #[Describe(['nullable' => true])]
    public ?string $annotation_level = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @see $raw_details */
    public const raw_details = 'raw_details';
    #[Describe(['nullable' => true])]
    public ?string $raw_details = null;

    /** @see $blob_href */
    public const blob_href = 'blob_href';
    #[Describe(['nullable' => true])]
    public ?string $blob_href = null;
}
