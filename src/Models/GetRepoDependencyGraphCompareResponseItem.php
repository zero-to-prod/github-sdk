<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GetRepoDependencyGraphCompareResponseItem
{
    use DataModel;

    /** @see $change_type */
    public const change_type = 'change_type';
    #[Describe(['default' => DependencyGraphDiffItemChangeType::unknown])]
    public DependencyGraphDiffItemChangeType $change_type;

    /** @see $manifest */
    public const manifest = 'manifest';
    #[Describe(['nullable' => true])]
    public ?string $manifest = null;

    /** @see $ecosystem */
    public const ecosystem = 'ecosystem';
    #[Describe(['nullable' => true])]
    public ?string $ecosystem = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $version */
    public const version = 'version';
    #[Describe(['nullable' => true])]
    public ?string $version = null;

    /** @see $package_url */
    public const package_url = 'package_url';
    #[Describe(['nullable' => true])]
    public ?string $package_url = null;

    /** @see $license */
    public const license = 'license';
    #[Describe(['nullable' => true])]
    public ?string $license = null;

    /** @see $source_repository_url */
    public const source_repository_url = 'source_repository_url';
    #[Describe(['nullable' => true])]
    public ?string $source_repository_url = null;

    /** @see $vulnerabilities */
    public const vulnerabilities = 'vulnerabilities';
    /** @var array<int, GetRepoDependencyGraphCompareResponseItemVulnerabilitiesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => GetRepoDependencyGraphCompareResponseItemVulnerabilitiesItem::class,
        'default' => [],
    ])]
    public array $vulnerabilities;

    /** @see $scope */
    public const scope = 'scope';
    #[Describe(['default' => DependencyGraphDiffItemScope::unknown])]
    public DependencyGraphDiffItemScope $scope;
}
