<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DependencyGraphSpdxSbomSbomPackagesItemExternalRefsItem
{
    use DataModel;

    /** @see $referenceCategory */
    public const referenceCategory = 'referenceCategory';
    #[Describe(['nullable' => true])]
    public ?string $referenceCategory = null;

    /** @see $referenceLocator */
    public const referenceLocator = 'referenceLocator';
    #[Describe(['nullable' => true])]
    public ?string $referenceLocator = null;

    /** @see $referenceType */
    public const referenceType = 'referenceType';
    #[Describe(['nullable' => true])]
    public ?string $referenceType = null;
}
