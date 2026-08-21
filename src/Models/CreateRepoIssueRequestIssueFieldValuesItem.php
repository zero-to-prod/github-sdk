<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoIssueRequestIssueFieldValuesItem
{
    use DataModel;

    /** @see $field_id */
    public const field_id = 'field_id';
    #[Describe(['nullable' => true])]
    public ?int $field_id = null;

    /** @see $value */
    public const value = 'value';
    #[Describe(['nullable' => true])]
    public string|float|array|null $value = null;
}
