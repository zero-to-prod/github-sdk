<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk;

use Zerotoprod\Sdk\Models\Errors;

/**
 * Wraps an API response. On success (2xx), `$data` holds the hydrated
 * response model and `$errors` is null. On failure, `$data` is null and
 * `$errors` holds the hydrated Errors model. The raw HTTP response is always
 * available via `$response`.
 *
 * @template TData
 */
class ApiResult
{
    /**
     * @param  Response     $response  The raw HTTP response.
     * @param  TData|null   $data      Hydrated success model (null on failure).
     * @param  Errors|null  $errors    Hydrated error model (null on success).
     */
    public function __construct(
        public readonly Response $response,
        public readonly mixed    $data = null,
        public readonly ?Errors  $errors = null,
    ) {}

    /** True when the HTTP status is 2xx. */
    public function ok(): bool
    {
        return $this->response->ok();
    }

    /** True when the HTTP status is outside 2xx. */
    public function failed(): bool
    {
        return !$this->ok();
    }

    /** HTTP status code. */
    public function status(): int
    {
        return $this->response->status;
    }
}
