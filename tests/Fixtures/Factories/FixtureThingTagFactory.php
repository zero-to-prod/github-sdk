<?php

namespace Tests\Fixtures\Factories;

use Tests\Fixtures\Models\FixtureThingTag;
use Zerotoprod\DataModelFactory\DataModelFactory;

class FixtureThingTagFactory
{
    use DataModelFactory;

    protected $model = FixtureThingTag::class;

    protected function definition(): array
    {
        return [
            FixtureThingTag::id => '01HABCDEF000000000000001',
            FixtureThingTag::name => 'featured',
            FixtureThingTag::created_at => '2026-01-01T00:00:00Z',
        ];
    }

    public function make(array $context = []): FixtureThingTag
    {
        return $this->instantiate($context);
    }
}
