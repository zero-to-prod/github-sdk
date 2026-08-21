<?php

namespace Zerotoprod\Sdk\Factories;

use Zerotoprod\DataModelFactory\DataModelFactory;
use Zerotoprod\Sdk\SdkConfig;

class SdkConfigFactory
{
    use DataModelFactory;

    protected $model = SdkConfig::class;

    protected function definition(): array
    {
        return [
            SdkConfig::url => 'https://api.example.com',
        ];
    }

    public function make(array $context = []): SdkConfig
    {
        return $this->instantiate($context);
    }
}
