<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningAlertInstanceMessage
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
