<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Specifies whether this release should be set as the latest release for the
 * repository. Drafts and prereleases cannot be set as latest. Defaults to
 * `true` for newly published releases. `legacy` specifies that the latest
 * release should be determined based on the release creation date and higher
 * semantic version.
 * @link https://docs.github.com/
 */
enum CreateRepoReleaseRequestMakeLatest: string
{
    case unknown = 'unknown';
    case true = 'true';
    case false = 'false';
    case legacy = 'legacy';
}
