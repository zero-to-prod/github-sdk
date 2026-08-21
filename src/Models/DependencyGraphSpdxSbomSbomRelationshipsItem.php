<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DependencyGraphSpdxSbomSbomRelationshipsItem
{
    use DataModel;

    /** @see $relationshipType */
    public const relationshipType = 'relationshipType';
    #[Describe(['nullable' => true])]
    public ?string $relationshipType = null;

    /** @see $spdxElementId */
    public const spdxElementId = 'spdxElementId';
    #[Describe(['nullable' => true])]
    public ?string $spdxElementId = null;

    /** @see $relatedSpdxElement */
    public const relatedSpdxElement = 'relatedSpdxElement';
    #[Describe(['nullable' => true])]
    public ?string $relatedSpdxElement = null;
}
