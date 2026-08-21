<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgAttestationBulkListResponseAttestationsSubjectDigestsValueItem
{
    use DataModel;

    /** @see $bundle */
    public const bundle = 'bundle';
    #[Describe(['nullable' => true])]
    public ?CreateOrgAttestationBulkListResponseAttestationsSubjectDigestsValueItemBundle $bundle = null;

    /** @see $repository_id */
    public const repository_id = 'repository_id';
    #[Describe(['nullable' => true])]
    public ?int $repository_id = null;

    /** @see $bundle_url */
    public const bundle_url = 'bundle_url';
    #[Describe(['nullable' => true])]
    public ?string $bundle_url = null;
}
