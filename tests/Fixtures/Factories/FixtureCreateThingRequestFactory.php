<?php

namespace Tests\Fixtures\Factories;

use Tests\Fixtures\Models\FixtureCreateThingRequest;
use Tests\Fixtures\Models\FixtureThingStatus;
use Zerotoprod\DataModelFactory\DataModelFactory;

class FixtureCreateThingRequestFactory
{
    use DataModelFactory;

    protected $model = FixtureCreateThingRequest::class;

    protected function definition(): array
    {
        return [
            FixtureCreateThingRequest::name => 'Example thing',
            FixtureCreateThingRequest::status => FixtureThingStatus::active->value,
        ];
    }

    public function make(array $context = []): FixtureCreateThingRequest
    {
        return $this->instantiate($context);
    }
}
