<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class Manifest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $file */
    public const file = 'file';
    #[Describe(['nullable' => true])]
    public ?ManifestFile $file = null;

    /** @see $metadata */
    public const metadata = 'metadata';
    /** @var array<string, string|float|bool> */
    #[Describe(['default' => []])]
    public array $metadata;

    /** @see $resolved */
    public const resolved = 'resolved';
    /** @var array<string, Dependency> */
    #[Describe(['default' => []])]
    public array $resolved;
}
