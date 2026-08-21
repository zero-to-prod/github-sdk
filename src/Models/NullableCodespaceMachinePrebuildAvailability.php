<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Whether a prebuild is currently available when creating a codespace for
 * this machine and repository. If a branch was not specified as a ref, the
 * default branch will be assumed. Value will be "null" if prebuilds are not
 * supported or prebuild availability could not be determined. Value will be
 * "none" if no prebuild is available. Latest values "ready" and
 * "in_progress" indicate the prebuild availability status.
 * @link https://docs.github.com/
 */
enum NullableCodespaceMachinePrebuildAvailability: string
{
    case unknown = 'unknown';
    case none = 'none';
    case ready = 'ready';
    case in_progress = 'in_progress';
}
