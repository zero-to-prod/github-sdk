<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateMarkdownRequest
{
    use DataModel;

    /** @see $text */
    public const text = 'text';
    #[Describe(['nullable' => true])]
    public ?string $text = null;

    /** @see $mode */
    public const mode = 'mode';
    #[Describe(['nullable' => true])]
    public ?CreateMarkdownRequestMode $mode = null;

    /** @see $context */
    public const context = 'context';
    #[Describe(['nullable' => true])]
    public ?string $context = null;
}
