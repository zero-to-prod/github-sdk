<?php

namespace Tests\Fixtures\Factories;

use Tests\Fixtures\Models\FixtureThingStatus;
use Tests\Fixtures\Models\FixtureUpdateThingRequest;
use Zerotoprod\DataModelFactory\DataModelFactory;

class FixtureUpdateThingRequestFactory
{
    use DataModelFactory;

    protected $model = FixtureUpdateThingRequest::class;

    protected function definition(): array
    {
        return [
            FixtureUpdateThingRequest::name => 'Renamed thing',
            FixtureUpdateThingRequest::status => FixtureThingStatus::archived->value,
        ];
    }

    public function make(array $context = []): FixtureUpdateThingRequest
    {
        return $this->instantiate($context);
    }
}
