<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DependencyGraphSpdxSbomSbom
{
    use DataModel;

    /** @see $SPDXID */
    public const SPDXID = 'SPDXID';
    #[Describe(['nullable' => true])]
    public ?string $SPDXID = null;

    /** @see $spdxVersion */
    public const spdxVersion = 'spdxVersion';
    #[Describe(['nullable' => true])]
    public ?string $spdxVersion = null;

    /** @see $comment */
    public const comment = 'comment';
    #[Describe(['nullable' => true])]
    public ?string $comment = null;

    /** @see $creationInfo */
    public const creationInfo = 'creationInfo';
    #[Describe(['nullable' => true])]
    public ?DependencyGraphSpdxSbomSbomCreationInfo $creationInfo = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $dataLicense */
    public const dataLicense = 'dataLicense';
    #[Describe(['nullable' => true])]
    public ?string $dataLicense = null;

    /** @see $documentNamespace */
    public const documentNamespace = 'documentNamespace';
    #[Describe(['nullable' => true])]
    public ?string $documentNamespace = null;

    /** @see $packages */
    public const packages = 'packages';
    /** @var array<int, DependencyGraphSpdxSbomSbomPackagesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => DependencyGraphSpdxSbomSbomPackagesItem::class,
        'default' => [],
    ])]
    public array $packages;

    /** @see $relationships */
    public const relationships = 'relationships';
    /** @var array<int, DependencyGraphSpdxSbomSbomRelationshipsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => DependencyGraphSpdxSbomSbomRelationshipsItem::class,
        'default' => [],
    ])]
    public array $relationships;
}
