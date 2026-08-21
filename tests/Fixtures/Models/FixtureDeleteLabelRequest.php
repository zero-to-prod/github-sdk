<?php

declare(strict_types=1);

namespace Tests\Fixtures\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Body of a DELETE. Rare in the wild and absent from the shipped example
 * domain, which is exactly why the fixture route declares one: the dispatcher
 * sends `json` for any operation with a `request:`, whatever its HTTP method.
 */
class FixtureDeleteLabelRequest
{
    use DataModel;

    public const reason = 'reason';
    #[Describe(['nullable' => true])]
    public ?string $reason = null;
}
