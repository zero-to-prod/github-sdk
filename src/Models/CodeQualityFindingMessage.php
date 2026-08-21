<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Code quality finding message
 * @link https://docs.github.com/
 */
class CodeQualityFindingMessage
{
    use DataModel;

    /** @see $text */
    public const text = 'text';
    #[Describe(['nullable' => true])]
    public ?string $text = null;

    /** @see $markdown */
    public const markdown = 'markdown';
    #[Describe(['nullable' => true])]
    public ?string $markdown = null;
}
