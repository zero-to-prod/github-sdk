<?php

namespace Tests\Fixtures\Factories;

use Tests\Fixtures\Models\FixtureThing;
use Tests\Fixtures\Models\FixtureThingStatus;
use Zerotoprod\DataModelFactory\DataModelFactory;

/**
 * Fixture counterpart of a package factory. The shared factory tests build
 * against these so they keep passing in a generated package, where the example
 * domain's factories are gone.
 */
class FixtureThingFactory
{
    use DataModelFactory;

    protected $model = FixtureThing::class;

    protected function definition(): array
    {
        return [
            FixtureThing::id => '01HABCDEF000000000000000',
            FixtureThing::name => 'Example thing',
            FixtureThing::status => FixtureThingStatus::active->value,
            FixtureThing::created_at => '2026-01-01T00:00:00Z',
            FixtureThing::updated_at => '2026-01-01T00:00:00Z',
        ];
    }

    public function make(array $context = []): FixtureThing
    {
        return $this->instantiate($context);
    }
}
