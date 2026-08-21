<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Protected Branch Required Status Check
 * @link https://docs.github.com/
 */
class ProtectedBranchRequiredStatusCheck
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $enforcement_level */
    public const enforcement_level = 'enforcement_level';
    #[Describe(['nullable' => true])]
    public ?string $enforcement_level = null;

    /** @see $contexts */
    public const contexts = 'contexts';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $contexts;

    /** @see $checks */
    public const checks = 'checks';
    /** @var array<int, ProtectedBranchRequiredStatusCheckChecksItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ProtectedBranchRequiredStatusCheckChecksItem::class,
        'default' => [],
    ])]
    public array $checks;

    /** @see $contexts_url */
    public const contexts_url = 'contexts_url';
    #[Describe(['nullable' => true])]
    public ?string $contexts_url = null;

    /** @see $strict */
    public const strict = 'strict';
    #[Describe(['nullable' => true])]
    public ?bool $strict = null;
}
