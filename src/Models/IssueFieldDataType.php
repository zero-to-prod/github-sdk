<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The data type of the issue field.
 * @link https://docs.github.com/
 */
enum IssueFieldDataType: string
{
    case unknown = 'unknown';
    case text = 'text';
    case date = 'date';
    case single_select = 'single_select';
    case multi_select = 'multi_select';
    case number = 'number';
}
