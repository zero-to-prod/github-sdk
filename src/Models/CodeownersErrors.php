<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A list of errors found in a repo's CODEOWNERS file
 * @link https://docs.github.com/
 */
class CodeownersErrors
{
    use DataModel;

    /** @see $errors */
    public const errors = 'errors';
    /** @var array<int, CodeownersErrorsErrorsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CodeownersErrorsErrorsItem::class,
        'default' => [],
    ])]
    public array $errors;
}
