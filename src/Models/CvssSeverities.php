<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CvssSeverities
{
    use DataModel;

    /** @see $cvss_v3 */
    public const cvss_v3 = 'cvss_v3';
    #[Describe(['nullable' => true])]
    public ?CvssSeveritiesCvssV3 $cvss_v3 = null;

    /** @see $cvss_v4 */
    public const cvss_v4 = 'cvss_v4';
    #[Describe(['nullable' => true])]
    public ?CvssSeveritiesCvssV4 $cvss_v4 = null;
}
