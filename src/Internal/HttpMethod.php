<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Internal;

/** @internal */
enum HttpMethod: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case PATCH = 'PATCH';
    case DELETE = 'DELETE';
}
