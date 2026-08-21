<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningSarifsStatus
{
    use DataModel;

    /** @see $processing_status */
    public const processing_status = 'processing_status';
    #[Describe(['nullable' => true])]
    public ?CodeScanningSarifsStatusProcessingStatus $processing_status = null;

    /** @see $analyses_url */
    public const analyses_url = 'analyses_url';
    #[Describe(['nullable' => true])]
    public ?string $analyses_url = null;

    /** @see $errors */
    public const errors = 'errors';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $errors;
}
