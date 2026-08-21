<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeownersErrorsErrorsItem
{
    use DataModel;

    /** @see $line */
    public const line = 'line';
    #[Describe(['nullable' => true])]
    public ?int $line = null;

    /** @see $column */
    public const column = 'column';
    #[Describe(['nullable' => true])]
    public ?int $column = null;

    /** @see $source */
    public const source = 'source';
    #[Describe(['nullable' => true])]
    public ?string $source = null;

    /** @see $kind */
    public const kind = 'kind';
    #[Describe(['nullable' => true])]
    public ?string $kind = null;

    /** @see $suggestion */
    public const suggestion = 'suggestion';
    #[Describe(['nullable' => true])]
    public ?string $suggestion = null;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;
}
