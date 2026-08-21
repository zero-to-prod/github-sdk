<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A version of a software package
 * @link https://docs.github.com/
 */
class PackageVersion
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $package_html_url */
    public const package_html_url = 'package_html_url';
    #[Describe(['nullable' => true])]
    public ?string $package_html_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $license */
    public const license = 'license';
    #[Describe(['nullable' => true])]
    public ?string $license = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $deleted_at */
    public const deleted_at = 'deleted_at';
    #[Describe(['nullable' => true])]
    public ?string $deleted_at = null;

    /** @see $metadata */
    public const metadata = 'metadata';
    #[Describe(['nullable' => true])]
    public ?PackageVersionMetadata $metadata = null;
}
