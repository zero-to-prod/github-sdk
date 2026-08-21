<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The initally assigned location of a new codespace.
 * @link https://docs.github.com/
 */
enum CodespaceLocation: string
{
    case unknown = 'unknown';
    case EastUs = 'EastUs';
    case SouthEastAsia = 'SouthEastAsia';
    case WestEurope = 'WestEurope';
    case WestUs2 = 'WestUs2';
}
