<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The file mode; one of `100644` for file (blob), `100755` for executable
 * (blob), `040000` for subdirectory (tree), `160000` for submodule (commit),
 * or `120000` for a blob that specifies the path of a symlink.
 * @link https://docs.github.com/
 */
enum CreateRepoGitTreeRequestTreeItemMode: string
{
    case unknown = 'unknown';
    case _100644 = '100644';
    case _100755 = '100755';
    case _040000 = '040000';
    case _160000 = '160000';
    case _120000 = '120000';
}
