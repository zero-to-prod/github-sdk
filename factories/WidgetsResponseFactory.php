<?php

namespace Zerotoprod\Sdk\Factories;

use Zerotoprod\DataModelFactory\DataModelFactory;
use Zerotoprod\Sdk\Models\WidgetsResponse;

class WidgetsResponseFactory
{
    use DataModelFactory;

    protected $model = WidgetsResponse::class;

    protected function definition(): array
    {
        return [
            WidgetsResponse::widgets => [
                WidgetFactory::factory()->context(),
            ],
            WidgetsResponse::Pagination => PaginationFactory::factory()->context(),
        ];
    }

    public function make(array $context = []): WidgetsResponse
    {
        return $this->instantiate($context);
    }
}
