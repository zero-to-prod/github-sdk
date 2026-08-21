<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Models;

/**
 * Example string enum. The generator emits one of these per OpenAPI
 * `string` schema that declares an `enum`, plus an `unknown` case so an
 * unrecognised value from the wire never throws.
 * @link https://example.com/docs
 */
enum WidgetStatus: string
{
    case unknown = 'unknown';
    case active = 'active';
    case archived = 'archived';
}
