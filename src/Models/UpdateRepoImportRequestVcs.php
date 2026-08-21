<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The originating VCS type. Without this parameter, the import job will take
 * additional time to detect the VCS type before beginning the import. This
 * detection step will be reflected in the response.
 * @link https://docs.github.com/
 */
enum UpdateRepoImportRequestVcs: string
{
    case unknown = 'unknown';
    case subversion = 'subversion';
    case git = 'git';
    case mercurial = 'mercurial';
    case tfvc = 'tfvc';
}
