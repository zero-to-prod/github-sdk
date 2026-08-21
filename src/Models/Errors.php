<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Error response payload. Hydrated from the full non-2xx envelope.
 * For validation failures (422) `errors` is keyed by field name; otherwise
 * it is a flat list of error messages.
 * @link https://docs.github.com/
 */
class Errors
{
    use DataModel;

    /** @see $message */
    public const message = 'message';
    /** @see $errors */
    public const errors = 'errors';

    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @var array<int|string, mixed> */
    #[Describe(['default' => []])]
    public array $errors = [];
}
