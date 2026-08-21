<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgAttestationBulkListResponse
{
    use DataModel;

    /** @see $attestations_subject_digests */
    public const attestations_subject_digests = 'attestations_subject_digests';
    /** @var array<string, array<int, CreateOrgAttestationBulkListResponseAttestationsSubjectDigestsValueItem>> */
    #[Describe(['default' => []])]
    public array $attestations_subject_digests;

    /** @see $page_info */
    public const page_info = 'page_info';
    #[Describe(['nullable' => true])]
    public ?CreateOrgAttestationBulkListResponsePageInfo $page_info = null;
}
