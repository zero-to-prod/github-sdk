<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgRequest
{
    use DataModel;

    /** @see $query_suite */
    public const query_suite = 'query_suite';
    #[Describe(['nullable' => true])]
    public ?CodeScanningDefaultSetupQuerySuite $query_suite = null;
}
