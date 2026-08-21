<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningAutofix
{
    use DataModel;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => CodeScanningAutofixStatus::unknown])]
    public CodeScanningAutofixStatus $status;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $started_at */
    public const started_at = 'started_at';
    #[Describe(['nullable' => true])]
    public ?string $started_at = null;
}
