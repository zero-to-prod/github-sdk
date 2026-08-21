<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * **Required when the `state` is `resolved`.** The reason for resolving the
 * alert.
 * @link https://docs.github.com/
 */
enum SecretScanningAlertResolution: string
{
    case unknown = 'unknown';
    case false_positive = 'false_positive';
    case wont_fix = 'wont_fix';
    case revoked = 'revoked';
    case used_in_tests = 'used_in_tests';
}
