<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Describe a region within a file for the alert.
 * @link https://docs.github.com/
 */
class CodeScanningAlertLocation
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
}
