<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of identifier.
 * @link https://docs.github.com/
 */
enum GlobalAdvisoryIdentifiersItemType: string
{
    case unknown = 'unknown';
    case CVE = 'CVE';
    case GHSA = 'GHSA';
}
