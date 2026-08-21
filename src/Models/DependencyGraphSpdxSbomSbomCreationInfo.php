<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DependencyGraphSpdxSbomSbomCreationInfo
{
    use DataModel;

    /** @see $created */
    public const created = 'created';
    #[Describe(['nullable' => true])]
    public ?string $created = null;

    /** @see $creators */
    public const creators = 'creators';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $creators;
}
