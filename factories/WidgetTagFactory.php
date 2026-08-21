<?php

namespace Zerotoprod\Sdk\Factories;

use Zerotoprod\DataModelFactory\DataModelFactory;
use Zerotoprod\Sdk\Models\WidgetTag;

class WidgetTagFactory
{
    use DataModelFactory;

    protected $model = WidgetTag::class;

    protected function definition(): array
    {
        return [
            WidgetTag::id => '01HABCDEF000000000000001',
            WidgetTag::name => 'featured',
            WidgetTag::created_at => '2026-01-01T00:00:00Z',
        ];
    }

    public function make(array $context = []): WidgetTag
    {
        return $this->instantiate($context);
    }
}
