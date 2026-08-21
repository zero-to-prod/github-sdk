<?php

declare(strict_types=1);

namespace Tests\Fixtures\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\Sdk\Internal\DataModel;

/** Element of the bare JSON array returned by `listThingTags` (`listOf:`). */
class FixtureThingTag
{
    use DataModel;

    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;
}
