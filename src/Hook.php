<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk;

/**
 * Lifecycle phase of a hooked request. The backing values double as the keys
 * of the `$hooks` array passed.
 */
enum Hook: string
{
    case before = 'before';
    case after = 'after';
    case onException = 'onException';
}
