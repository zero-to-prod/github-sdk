<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Details for the vulnerable dependency.
 * @link https://docs.github.com/
 */
class DependabotAlertDependency
{
    use DataModel;

    /** @see $package */
    public const package = 'package';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertPackage $package = null;

    /** @see $manifest_path */
    public const manifest_path = 'manifest_path';
    #[Describe(['nullable' => true])]
    public ?string $manifest_path = null;

    /** @see $scope */
    public const scope = 'scope';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertWithRepositoryDependencyScope $scope = null;

    /** @see $relationship */
    public const relationship = 'relationship';
    #[Describe(['nullable' => true])]
    public ?DependabotAlertWithRepositoryDependencyRelationship $relationship = null;
}
