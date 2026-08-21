<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Runner Application
 * @link https://docs.github.com/
 */
class RunnerApplication
{
    use DataModel;

    /** @see $os */
    public const os = 'os';
    #[Describe(['nullable' => true])]
    public ?string $os = null;

    /** @see $architecture */
    public const architecture = 'architecture';
    #[Describe(['nullable' => true])]
    public ?string $architecture = null;

    /** @see $download_url */
    public const download_url = 'download_url';
    #[Describe(['nullable' => true])]
    public ?string $download_url = null;

    /** @see $filename */
    public const filename = 'filename';
    #[Describe(['nullable' => true])]
    public ?string $filename = null;

    /** @see $temp_download_token */
    public const temp_download_token = 'temp_download_token';
    #[Describe(['nullable' => true])]
    public ?string $temp_download_token = null;

    /** @see $sha256_checksum */
    public const sha256_checksum = 'sha256_checksum';
    #[Describe(['nullable' => true])]
    public ?string $sha256_checksum = null;
}
