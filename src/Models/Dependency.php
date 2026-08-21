<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class Dependency
{
    use DataModel;

    /** @see $package_url */
    public const package_url = 'package_url';
    #[Describe(['nullable' => true])]
    public ?string $package_url = null;

    /** @see $metadata */
    public const metadata = 'metadata';
    /** @var array<string, string|float|bool> */
    #[Describe(['default' => []])]
    public array $metadata;

    /** @see $relationship */
    public const relationship = 'relationship';
    #[Describe(['nullable' => true])]
    public ?DependencyRelationship $relationship = null;

    /** @see $scope */
    public const scope = 'scope';
    #[Describe(['nullable' => true])]
    public ?DependencyGraphDiffItemScope $scope = null;

    /** @see $dependencies */
    public const dependencies = 'dependencies';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $dependencies;
}
