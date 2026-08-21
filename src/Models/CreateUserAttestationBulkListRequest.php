<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateUserAttestationBulkListRequest
{
    use DataModel;

    /** @see $subject_digests */
    public const subject_digests = 'subject_digests';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $subject_digests;

    /** @see $predicate_type */
    public const predicate_type = 'predicate_type';
    #[Describe(['nullable' => true])]
    public ?string $predicate_type = null;
}
