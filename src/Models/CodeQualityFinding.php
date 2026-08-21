<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Code quality finding
 * @link https://docs.github.com/
 */
class CodeQualityFinding
{
    use DataModel;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => CodeQualityFindingState::unknown])]
    public CodeQualityFindingState $state;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $rule */
    public const rule = 'rule';
    #[Describe(['nullable' => true])]
    public ?CodeQualityFindingRule $rule = null;

    /** @see $location */
    public const location = 'location';
    #[Describe(['nullable' => true])]
    public ?CodeQualityFindingLocation $location = null;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?CodeQualityFindingMessage $message = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;
}
