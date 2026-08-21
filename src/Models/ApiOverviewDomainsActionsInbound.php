<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ApiOverviewDomainsActionsInbound
{
    use DataModel;

    /** @see $full_domains */
    public const full_domains = 'full_domains';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $full_domains;

    /** @see $wildcard_domains */
    public const wildcard_domains = 'wildcard_domains';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $wildcard_domains;
}
