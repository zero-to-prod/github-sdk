<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\Sdk\Internal\DataModel;

/**
 * Example resource. Replace this file — `composer generate-sdk` overwrites
 * `src/Models/` from the OpenAPI document declared in `sdk.json`.
 * @link https://example.com/docs
 */
class Widget
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => WidgetStatus::unknown])]
    public WidgetStatus $status;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
