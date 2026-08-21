<?php

declare(strict_types=1);

namespace Tests\Fixtures\Published;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/** A "published" override of the `listOf:` element class. */
class FixtureThingTag
{
    use DataModel;

    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    public function publishedMarker(): string
    {
        return 'published';
    }
}
