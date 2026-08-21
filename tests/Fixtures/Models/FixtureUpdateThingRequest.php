<?php

declare(strict_types=1);

namespace Tests\Fixtures\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/** PATCH body. */
class FixtureUpdateThingRequest
{
    use DataModel;

    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?FixtureThingStatus $status = null;
}
