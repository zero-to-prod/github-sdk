<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Repository Identifier
 * @link https://docs.github.com/
 */
class CodeScanningVariantAnalysisRepository
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

    /** @see $full_name */
    public const full_name = 'full_name';
    #[Describe(['nullable' => true])]
    public ?string $full_name = null;

    /** @see $private */
    public const private = 'private';
    #[Describe(['nullable' => true])]
    public ?bool $private = null;

    /** @see $stargazers_count */
    public const stargazers_count = 'stargazers_count';
    #[Describe(['nullable' => true])]
    public ?int $stargazers_count = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
