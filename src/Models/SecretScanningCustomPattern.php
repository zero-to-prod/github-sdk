<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A custom pattern for secret scanning.
 * @link https://docs.github.com/
 */
class SecretScanningCustomPattern
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $pattern */
    public const pattern = 'pattern';
    #[Describe(['nullable' => true])]
    public ?string $pattern = null;

    /** @see $slug */
    public const slug = 'slug';
    #[Describe(['nullable' => true])]
    public ?string $slug = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => SecretScanningCustomPatternState::unknown])]
    public SecretScanningCustomPatternState $state;

    /** @see $push_protection_enabled */
    public const push_protection_enabled = 'push_protection_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $push_protection_enabled = null;

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

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
