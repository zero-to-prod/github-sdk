<?php

namespace Zerotoprod\GitHubSdk\Factories;

use Zerotoprod\DataModelFactory\DataModelFactory;
use Zerotoprod\GitHubSdk\GitHubSdkConfig;

class GitHubSdkConfigFactory
{
    use DataModelFactory;

    protected $model = GitHubSdkConfig::class;

    protected function definition(): array
    {
        return [
            GitHubSdkConfig::url => 'https://api.example.com',
        ];
    }

    public function make(array $context = []): GitHubSdkConfig
    {
        return $this->instantiate($context);
    }
}
