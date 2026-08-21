<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Content File
 * @link https://docs.github.com/
 */
class ContentFile
{
    use DataModel;

    /** @see $type */
    public const type = 'type';
    #[Describe(['default' => ContentFileType::unknown])]
    public ContentFileType $type;

    /** @see $encoding */
    public const encoding = 'encoding';
    #[Describe(['nullable' => true])]
    public ?string $encoding = null;

    /** @see $size */
    public const size = 'size';
    #[Describe(['nullable' => true])]
    public ?int $size = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $content */
    public const content = 'content';
    #[Describe(['nullable' => true])]
    public ?string $content = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $git_url */
    public const git_url = 'git_url';
    #[Describe(['nullable' => true])]
    public ?string $git_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $download_url */
    public const download_url = 'download_url';
    #[Describe(['nullable' => true])]
    public ?string $download_url = null;

    /** @see $links */
    public const links = '_links';
    #[Describe([
        'from' => self::links,
        'nullable' => true,
    ])]
    public ?ContentFileLinks $links = null;

    /** @see $target */
    public const target = 'target';
    #[Describe(['nullable' => true])]
    public ?string $target = null;

    /** @see $submodule_git_url */
    public const submodule_git_url = 'submodule_git_url';
    #[Describe(['nullable' => true])]
    public ?string $submodule_git_url = null;
}
