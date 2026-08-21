<?php

namespace Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\Fixtures\FixtureRoute;
use Tests\TestCase;
use Zerotoprod\Sdk\ApiRoute;
use Zerotoprod\Sdk\SdkConfig;

class ConfigTest extends TestCase
{
    #[Test]
    public function assigns_config_values(): void
    {
        $config = [
            SdkConfig::url => 'https://api.example.com',
            SdkConfig::headers => ['Authorization' => 'Bearer token'],
            SdkConfig::model_namespace => 'Zerotoprod\\Sdk\\Models',
            SdkConfig::route_enum => FixtureRoute::class,
        ];

        self::assertSame(
            expected: $config,
            actual: SdkConfig::from($config)->toArray(),
        );
    }

    #[Test]
    public function model_namespace_has_default(): void
    {
        $config = SdkConfig::fromConfig([
            SdkConfig::url => 'https://api.example.com',
        ]);

        self::assertSame('Zerotoprod\\Sdk\\Models', $config->model_namespace);
    }

    #[Test]
    public function headers_default_to_none(): void
    {
        self::assertSame([], SdkConfig::fromConfig([SdkConfig::url => 'https://api.example.com'])->headers);
    }

    #[Test]
    public function url_defaults_to_an_empty_string(): void
    {
        $config = SdkConfig::fromConfig([]);

        self::assertSame('', $config->url);
        self::assertSame('Zerotoprod\\Sdk\\Models', $config->model_namespace);
    }

    #[Test]
    public function route_enum_defaults_to_the_packages_own_api_route(): void
    {
        self::assertSame(ApiRoute::class, SdkConfig::fromConfig([])->route_enum);
    }

    #[Test]
    public function route_enum_can_be_pointed_at_another_string_backed_enum(): void
    {
        $config = SdkConfig::fromConfig([SdkConfig::route_enum => FixtureRoute::class]);

        self::assertSame(FixtureRoute::class, $config->route_enum);
    }
}
