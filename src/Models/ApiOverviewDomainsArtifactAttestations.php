<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ApiOverviewDomainsArtifactAttestations
{
    use DataModel;

    /** @see $trust_domain */
    public const trust_domain = 'trust_domain';
    #[Describe(['nullable' => true])]
    public ?string $trust_domain = null;

    /** @see $services */
    public const services = 'services';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $services;
}
