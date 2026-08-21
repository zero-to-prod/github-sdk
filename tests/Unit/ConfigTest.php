<?php

namespace Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\Fixtures\FixtureRoute;
use Tests\TestCase;
use Zerotoprod\GitHubSdk\ApiRoute;
use Zerotoprod\GitHubSdk\GitHubSdkConfig;

class ConfigTest extends TestCase
{
    #[Test]
    public function assigns_config_values(): void
    {
        $config = [
            GitHubSdkConfig::url => 'https://api.example.com',
            GitHubSdkConfig::headers => ['Authorization' => 'Bearer token'],
            GitHubSdkConfig::model_namespace => 'Zerotoprod\\GitHubSdk\\Models',
            GitHubSdkConfig::route_enum => FixtureRoute::class,
        ];

        self::assertSame(
            expected: $config,
            actual: GitHubSdkConfig::from($config)->toArray(),
        );
    }

    #[Test]
    public function model_namespace_has_default(): void
    {
        $config = GitHubSdkConfig::fromConfig([
            GitHubSdkConfig::url => 'https://api.example.com',
        ]);

        self::assertSame('Zerotoprod\\GitHubSdk\\Models', $config->model_namespace);
    }

    #[Test]
    public function headers_default_to_none(): void
    {
        self::assertSame([], GitHubSdkConfig::fromConfig([GitHubSdkConfig::url => 'https://api.example.com'])->headers);
    }

    #[Test]
    public function url_defaults_to_an_empty_string(): void
    {
        $config = GitHubSdkConfig::fromConfig([]);

        self::assertSame('', $config->url);
        self::assertSame('Zerotoprod\\GitHubSdk\\Models', $config->model_namespace);
    }

    #[Test]
    public function route_enum_defaults_to_the_packages_own_api_route(): void
    {
        self::assertSame(ApiRoute::class, GitHubSdkConfig::fromConfig([])->route_enum);
    }

    #[Test]
    public function route_enum_can_be_pointed_at_another_string_backed_enum(): void
    {
        $config = GitHubSdkConfig::fromConfig([GitHubSdkConfig::route_enum => FixtureRoute::class]);

        self::assertSame(FixtureRoute::class, $config->route_enum);
    }
}
