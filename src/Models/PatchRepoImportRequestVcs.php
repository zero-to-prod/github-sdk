<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of version control system you are migrating from.
 * @link https://docs.github.com/
 */
enum PatchRepoImportRequestVcs: string
{
    case unknown = 'unknown';
    case subversion = 'subversion';
    case tfvc = 'tfvc';
    case git = 'git';
    case mercurial = 'mercurial';
}
