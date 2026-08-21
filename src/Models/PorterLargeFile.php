<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Porter Large File
 * @link https://docs.github.com/
 */
class PorterLargeFile
{
    use DataModel;

    /** @see $ref_name */
    public const ref_name = 'ref_name';
    #[Describe(['nullable' => true])]
    public ?string $ref_name = null;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $oid */
    public const oid = 'oid';
    #[Describe(['nullable' => true])]
    public ?string $oid = null;

    /** @see $size */
    public const size = 'size';
    #[Describe(['nullable' => true])]
    public ?int $size = null;
}
