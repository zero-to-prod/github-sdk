<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Status Check Policy
 * @link https://docs.github.com/
 */
class StatusCheckPolicy
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $strict */
    public const strict = 'strict';
    #[Describe(['nullable' => true])]
    public ?bool $strict = null;

    /** @see $contexts */
    public const contexts = 'contexts';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $contexts;

    /** @see $checks */
    public const checks = 'checks';
    /** @var array<int, StatusCheckPolicyChecksItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => StatusCheckPolicyChecksItem::class,
        'default' => [],
    ])]
    public array $checks;

    /** @see $contexts_url */
    public const contexts_url = 'contexts_url';
    #[Describe(['nullable' => true])]
    public ?string $contexts_url = null;
}
