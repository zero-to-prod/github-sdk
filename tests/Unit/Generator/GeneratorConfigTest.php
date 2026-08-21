<?php

namespace Unit\Generator;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\GitHubSdk\Generator\GeneratorConfig;

class GeneratorConfigTest extends TestCase
{
    #[Test]
    public function it_derives_output_paths_from_the_root(): void
    {
        $config = new GeneratorConfig('spec.json', '/pkg');

        self::assertSame('/pkg/src/Models', $config->modelsDirectory());
        self::assertSame('/pkg/factories', $config->factoriesDirectory());
        self::assertSame('/pkg/src/ApiRoute.php', $config->apiRoutePath());
        self::assertSame('Zerotoprod\\GitHubSdk\\Models', $config->modelNamespace());
    }

    #[Test]
    public function nothing_is_retained_unless_the_manifest_says_so(): void
    {
        self::assertSame([], (new GeneratorConfig('spec.json', '/pkg'))->retainModels);
        self::assertSame(
            ['Errors', 'Pagination', 'Query'],
            (new GeneratorConfig('spec.json', '/pkg', retainModels: ['Errors', 'Pagination', 'Query']))->retainModels,
        );
    }

    #[Test]
    public function the_model_namespace_follows_the_package_namespace(): void
    {
        self::assertSame(
            'Acme\\Api\\Models',
            (new GeneratorConfig('spec.json', '/pkg', 'Acme\\Api'))->modelNamespace(),
        );
    }

    #[Test]
    public function overwrites_lists_both_targets_by_default(): void
    {
        // `factories` is in there because the sweep deletes the factory that
        // belonged to every model it removes.
        self::assertSame(
            ['src/Models', 'factories', 'src/ApiRoute.php'],
            (new GeneratorConfig('spec.json', '/pkg'))->overwrites(),
        );
    }

    #[Test]
    public function overwrites_narrows_with_the_only_flags(): void
    {
        self::assertSame(
            ['src/Models', 'factories'],
            (new GeneratorConfig('spec.json', '/pkg', routes: false))->overwrites(),
        );
        self::assertSame(
            ['src/ApiRoute.php'],
            (new GeneratorConfig('spec.json', '/pkg', models: false))->overwrites(),
        );
        self::assertSame(
            [],
            (new GeneratorConfig('spec.json', '/pkg', models: false, routes: false))->overwrites(),
        );
    }
}
