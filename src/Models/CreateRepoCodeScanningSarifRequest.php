<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoCodeScanningSarifRequest
{
    use DataModel;

    /** @see $commit_sha */
    public const commit_sha = 'commit_sha';
    #[Describe(['nullable' => true])]
    public ?string $commit_sha = null;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;

    /** @see $sarif */
    public const sarif = 'sarif';
    #[Describe(['nullable' => true])]
    public ?string $sarif = null;

    /** @see $checkout_uri */
    public const checkout_uri = 'checkout_uri';
    #[Describe(['nullable' => true])]
    public ?string $checkout_uri = null;

    /** @see $started_at */
    public const started_at = 'started_at';
    #[Describe(['nullable' => true])]
    public ?string $started_at = null;

    /** @see $tool_name */
    public const tool_name = 'tool_name';
    #[Describe(['nullable' => true])]
    public ?string $tool_name = null;

    /** @see $validate */
    public const validate = 'validate';
    #[Describe(['nullable' => true])]
    public ?bool $validate = null;
}
