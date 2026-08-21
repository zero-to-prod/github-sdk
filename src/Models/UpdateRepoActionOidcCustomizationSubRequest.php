<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Actions OIDC subject customization for a repository
 * @link https://docs.github.com/
 */
class UpdateRepoActionOidcCustomizationSubRequest
{
    use DataModel;

    /** @see $use_default */
    public const use_default = 'use_default';
    #[Describe(['nullable' => true])]
    public ?bool $use_default = null;

    /** @see $include_claim_keys */
    public const include_claim_keys = 'include_claim_keys';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $include_claim_keys;

    /** @see $use_immutable_subject */
    public const use_immutable_subject = 'use_immutable_subject';
    #[Describe(['nullable' => true])]
    public ?bool $use_immutable_subject = null;
}
