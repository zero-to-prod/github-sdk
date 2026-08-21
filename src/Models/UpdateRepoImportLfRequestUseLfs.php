<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Whether to store large files during the import. `opt_in` means large files
 * will be stored using Git LFS. `opt_out` means large files will be removed
 * during the import.
 * @link https://docs.github.com/
 */
enum UpdateRepoImportLfRequestUseLfs: string
{
    case unknown = 'unknown';
    case opt_in = 'opt_in';
    case opt_out = 'opt_out';
}
