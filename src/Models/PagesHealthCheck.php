<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Pages Health Check Status
 * @link https://docs.github.com/
 */
class PagesHealthCheck
{
    use DataModel;

    /** @see $domain */
    public const domain = 'domain';
    #[Describe(['nullable' => true])]
    public ?PagesHealthCheckDomain $domain = null;

    /** @see $alt_domain */
    public const alt_domain = 'alt_domain';
    #[Describe(['nullable' => true])]
    public ?PagesHealthCheckAltDomain $alt_domain = null;
}
