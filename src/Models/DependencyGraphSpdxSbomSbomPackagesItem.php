<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DependencyGraphSpdxSbomSbomPackagesItem
{
    use DataModel;

    /** @see $SPDXID */
    public const SPDXID = 'SPDXID';
    #[Describe(['nullable' => true])]
    public ?string $SPDXID = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $versionInfo */
    public const versionInfo = 'versionInfo';
    #[Describe(['nullable' => true])]
    public ?string $versionInfo = null;

    /** @see $downloadLocation */
    public const downloadLocation = 'downloadLocation';
    #[Describe(['nullable' => true])]
    public ?string $downloadLocation = null;

    /** @see $filesAnalyzed */
    public const filesAnalyzed = 'filesAnalyzed';
    #[Describe(['nullable' => true])]
    public ?bool $filesAnalyzed = null;

    /** @see $licenseConcluded */
    public const licenseConcluded = 'licenseConcluded';
    #[Describe(['nullable' => true])]
    public ?string $licenseConcluded = null;

    /** @see $licenseDeclared */
    public const licenseDeclared = 'licenseDeclared';
    #[Describe(['nullable' => true])]
    public ?string $licenseDeclared = null;

    /** @see $supplier */
    public const supplier = 'supplier';
    #[Describe(['nullable' => true])]
    public ?string $supplier = null;

    /** @see $copyrightText */
    public const copyrightText = 'copyrightText';
    #[Describe(['nullable' => true])]
    public ?string $copyrightText = null;

    /** @see $externalRefs */
    public const externalRefs = 'externalRefs';
    /** @var array<int, DependencyGraphSpdxSbomSbomPackagesItemExternalRefsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => DependencyGraphSpdxSbomSbomPackagesItemExternalRefsItem::class,
        'default' => [],
    ])]
    public array $externalRefs;
}
