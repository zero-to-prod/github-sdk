<?php

namespace Zerotoprod\Sdk\Factories;

use Zerotoprod\DataModelFactory\DataModelFactory;
use Zerotoprod\Sdk\Models\CreateWidgetRequest;
use Zerotoprod\Sdk\Models\WidgetStatus;

class CreateWidgetRequestFactory
{
    use DataModelFactory;

    protected $model = CreateWidgetRequest::class;

    protected function definition(): array
    {
        return [
            CreateWidgetRequest::name => 'Example widget',
            CreateWidgetRequest::status => WidgetStatus::active->value,
        ];
    }

    public function make(array $context = []): CreateWidgetRequest
    {
        return $this->instantiate($context);
    }
}
