<?php

namespace Zerotoprod\Sdk\Factories;

use Zerotoprod\DataModelFactory\DataModelFactory;
use Zerotoprod\Sdk\Models\UpdateWidgetRequest;
use Zerotoprod\Sdk\Models\WidgetStatus;

class UpdateWidgetRequestFactory
{
    use DataModelFactory;

    protected $model = UpdateWidgetRequest::class;

    protected function definition(): array
    {
        return [
            UpdateWidgetRequest::name => 'Renamed widget',
            UpdateWidgetRequest::status => WidgetStatus::archived->value,
        ];
    }

    public function make(array $context = []): UpdateWidgetRequest
    {
        return $this->instantiate($context);
    }
}
