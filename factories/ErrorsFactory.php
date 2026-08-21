<?php

namespace Zerotoprod\Sdk\Factories;

use Zerotoprod\DataModelFactory\DataModelFactory;
use Zerotoprod\Sdk\Models\Errors;

class ErrorsFactory
{
    use DataModelFactory;

    protected $model = Errors::class;

    protected function definition(): array
    {
        return [
            Errors::message => 'Something went wrong',
            Errors::errors => [],
        ];
    }

    public function make(array $context = []): Errors
    {
        return $this->instantiate($context);
    }
}
