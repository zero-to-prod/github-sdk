<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of the value for the property
 * @link https://docs.github.com/
 */
enum CustomPropertyValueType: string
{
    case unknown = 'unknown';
    case string = 'string';
    case single_select = 'single_select';
    case multi_select = 'multi_select';
    case true_false = 'true_false';
    case url = 'url';
}
