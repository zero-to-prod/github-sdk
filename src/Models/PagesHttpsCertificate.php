<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PagesHttpsCertificate
{
    use DataModel;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => PagesHttpsCertificateState::unknown])]
    public PagesHttpsCertificateState $state;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $domains */
    public const domains = 'domains';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $domains;

    /** @see $expires_at */
    public const expires_at = 'expires_at';
    #[Describe(['nullable' => true])]
    public ?string $expires_at = null;
}
