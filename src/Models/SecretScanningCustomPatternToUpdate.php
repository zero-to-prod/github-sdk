<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Fields to update on a custom pattern. At least one updatable field
 * (`pattern`, `start_delimiter`, `end_delimiter`, `must_match`, or
 * `must_not_match`) must also be provided. Only provided fields will be
 * updated.
 * @link https://docs.github.com/
 */
class SecretScanningCustomPatternToUpdate
{
    use DataModel;

    /** @see $pattern */
    public const pattern = 'pattern';
    #[Describe(['nullable' => true])]
    public ?string $pattern = null;

    /** @see $start_delimiter */
    public const start_delimiter = 'start_delimiter';
    #[Describe(['nullable' => true])]
    public ?string $start_delimiter = null;

    /** @see $end_delimiter */
    public const end_delimiter = 'end_delimiter';
    #[Describe(['nullable' => true])]
    public ?string $end_delimiter = null;

    /** @see $must_match */
    public const must_match = 'must_match';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $must_match;

    /** @see $must_not_match */
    public const must_not_match = 'must_not_match';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $must_not_match;

    /** @see $custom_pattern_version */
    public const custom_pattern_version = 'custom_pattern_version';
    #[Describe(['nullable' => true])]
    public ?string $custom_pattern_version = null;
}
