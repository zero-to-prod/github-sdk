<?php

namespace Zerotoprod\GitHubSdk\Factories;

use Zerotoprod\DataModelFactory\DataModelFactory;
use Zerotoprod\GitHubSdk\Models\Widget;
use Zerotoprod\GitHubSdk\Models\WidgetStatus;

class WidgetFactory
{
    use DataModelFactory;

    protected $model = Widget::class;

    protected function definition(): array
    {
        return [
            Widget::id => '01HABCDEF000000000000000',
            Widget::name => 'Example widget',
            Widget::status => WidgetStatus::active->value,
            Widget::created_at => '2026-01-01T00:00:00Z',
            Widget::updated_at => '2026-01-01T00:00:00Z',
        ];
    }

    public function make(array $context = []): Widget
    {
        return $this->instantiate($context);
    }
}
