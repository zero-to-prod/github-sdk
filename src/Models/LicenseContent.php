<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * License Content
 * @link https://docs.github.com/
 */
class LicenseContent
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $size */
    public const size = 'size';
    #[Describe(['nullable' => true])]
    public ?int $size = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $git_url */
    public const git_url = 'git_url';
    #[Describe(['nullable' => true])]
    public ?string $git_url = null;

    /** @see $download_url */
    public const download_url = 'download_url';
    #[Describe(['nullable' => true])]
    public ?string $download_url = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;

    /** @see $content */
    public const content = 'content';
    #[Describe(['nullable' => true])]
    public ?string $content = null;

    /** @see $encoding */
    public const encoding = 'encoding';
    #[Describe(['nullable' => true])]
    public ?string $encoding = null;

    /** @see $links */
    public const links = '_links';
    #[Describe([
        'from' => self::links,
        'nullable' => true,
    ])]
    public ?LicenseContentLinks $links = null;

    /** @see $license */
    public const license = 'license';
    #[Describe(['nullable' => true])]
    public ?LicenseSimple $license = null;
}
