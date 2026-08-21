<?php

declare(strict_types=1);

namespace Tests\Fixtures\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/** Single-resource response model for {@see \Tests\Fixtures\FixtureRoute::thing}. */
class FixtureThing
{
    use DataModel;

    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    public const status = 'status';
    #[Describe(['default' => FixtureThingStatus::unknown])]
    public FixtureThingStatus $status;

    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
