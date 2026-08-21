<?php

namespace Unit\Generator;

use Closure;
use PHPUnit\Framework\Attributes\Test;
use Tests\Unit\Generator\GeneratorCase;
use Zerotoprod\Sdk\Generator\Emitter;
use Zerotoprod\Sdk\Generator\GeneratorConfig;
use Zerotoprod\Sdk\Generator\GeneratorException;
use Zerotoprod\Sdk\Generator\RouteCase;
use Zerotoprod\Sdk\Generator\RouteOperation;
use Zerotoprod\Sdk\Generator\RoutePlan;

class EmitterTest extends GeneratorCase
{
    /** @return array{Models: array<string, array<string, mixed>>, Enums: array<string, array<string, mixed>>} */
    private static function components(): array
    {
        return [
            'Models' => [
                'Widget' => [
                    'filename' => 'Widget.php',
                    'comment' => "/**\n * A widget.\n * @link https://example.com/docs\n */",
                    'imports' => ['use Zerotoprod\Sdk\Internal\DataModel;'],
                    'use_statements' => ['use DataModel;'],
                    'constants' => ['id' => ['comment' => '/** @see $id */', 'value' => "'id'"]],
                    'properties' => ['id' => ['types' => ['string', 'null']]],
                ],
            ],
            'Enums' => [
                'Colour' => [
                    'filename' => 'Colour.php',
                    'comment' => "/**\n * @link https://example.com/docs\n */",
                    'backed_type' => 'string',
                    'cases' => ['unknown' => ['value' => "'unknown'"]],
                ],
            ],
        ];
    }

    private function config(bool $dryRun = false): GeneratorConfig
    {
        return new GeneratorConfig(source: 'spec.json', root: $this->temp(), dryRun: $dryRun);
    }

    /**
     * Seed a package tree with model and factory files.
     *
     * @param  list<string>  $models
     * @param  list<string>  $factories
     */
    private function seed(array $models, array $factories = []): void
    {
        mkdir($this->temp() . '/src/Models', 0o775, true);
        mkdir($this->temp() . '/factories', 0o775, true);

        foreach ($models as $model) {
            touch($this->temp() . "/src/Models/$model.php");
        }

        foreach ($factories as $factory) {
            touch($this->temp() . "/factories/$factory.php");
        }
    }

    // ─── Sweeping stale models and their factories ─────────────────────

    #[Test]
    public function the_sweep_deletes_every_model_the_manifest_does_not_retain(): void
    {
        $this->seed(['Widget', 'WidgetStatus', 'Errors', 'Pagination', 'Query']);

        $removed = (new Emitter($this->config()))->sweep(['Errors', 'Pagination', 'Query']);

        self::assertSame([
            $this->temp() . '/src/Models/Widget.php',
            $this->temp() . '/src/Models/WidgetStatus.php',
        ], $removed);

        self::assertFileDoesNotExist($this->temp() . '/src/Models/Widget.php');
        self::assertFileExists($this->temp() . '/src/Models/Errors.php');
        self::assertFileExists($this->temp() . '/src/Models/Pagination.php');
        self::assertFileExists($this->temp() . '/src/Models/Query.php');
    }

    #[Test]
    public function the_factory_of_a_swept_model_goes_with_it(): void
    {
        $this->seed(
            ['Widget', 'Errors'],
            ['WidgetFactory', 'ErrorsFactory', 'PaginationFactory', 'SdkConfigFactory'],
        );

        (new Emitter($this->config()))->sweep(['Errors', 'Pagination', 'Query']);

        self::assertFileDoesNotExist($this->temp() . '/factories/WidgetFactory.php');
        // Keyed off the models actually deleted, so a retained model's factory —
        // and the config factory, which is named after no model — both survive.
        self::assertFileExists($this->temp() . '/factories/ErrorsFactory.php');
        self::assertFileExists($this->temp() . '/factories/PaginationFactory.php');
        self::assertFileExists($this->temp() . '/factories/SdkConfigFactory.php');
    }

    #[Test]
    public function a_dry_run_reports_the_intended_deletions_without_performing_them(): void
    {
        $this->seed(['Widget', 'Errors'], ['WidgetFactory']);

        $removed = (new Emitter($this->config(true)))->sweep(['Errors']);

        self::assertSame([
            $this->temp() . '/factories/WidgetFactory.php',
            $this->temp() . '/src/Models/Widget.php',
        ], $removed);

        self::assertFileExists($this->temp() . '/src/Models/Widget.php');
        self::assertFileExists($this->temp() . '/factories/WidgetFactory.php');
    }

    #[Test]
    public function sweeping_a_package_with_no_models_directory_is_a_no_op(): void
    {
        self::assertSame([], (new Emitter($this->config()))->sweep(['Errors']));
    }

    #[Test]
    public function it_writes_normalized_models_and_enums(): void
    {
        $files = (new Emitter($this->config()))->emitModels(self::components());

        self::assertSame(
            [$this->temp() . '/src/Models/Widget.php', $this->temp() . '/src/Models/Colour.php'],
            $files,
        );

        foreach ($files as $file) {
            self::assertFileExists($file);
            self::assertLints($file);
            self::assertStringContainsString('declare(strict_types=1);', (string) file_get_contents($file));
        }
    }

    #[Test]
    public function it_creates_the_output_directory(): void
    {
        $directory = $this->temp() . '/src/Models';
        self::assertDirectoryDoesNotExist($directory);

        (new Emitter($this->config()))->emitModels(self::components());

        self::assertDirectoryExists($directory);
    }

    #[Test]
    public function a_dry_run_plans_the_paths_without_writing(): void
    {
        $files = (new Emitter($this->config(true)))->emitModels(self::components());

        self::assertCount(2, $files);
        self::assertDirectoryDoesNotExist($this->temp() . '/src/Models');
    }

    #[Test]
    public function it_writes_the_route_enum(): void
    {
        $plan = new RoutePlan([
            new RouteCase('widget', '/v1/widgets/{id}', [new RouteOperation('GET', 'getWidget', ['id'])]),
        ]);

        $path = (new Emitter($this->config()))->emitRoutes($plan);

        self::assertSame($this->temp() . '/src/ApiRoute.php', $path);
        self::assertLints($path);
        self::assertStringContainsString("case widget = '/v1/widgets/{id}';", (string) file_get_contents($path));
    }

    #[Test]
    public function a_dry_run_plans_the_route_path_without_writing(): void
    {
        $path = (new Emitter($this->config(true)))->emitRoutes(new RoutePlan());

        self::assertSame($this->temp() . '/src/ApiRoute.php', $path);
        self::assertFileDoesNotExist($path);
    }

    #[Test]
    public function an_undirectoryable_output_path_is_reported(): void
    {
        $file = $this->temp() . '/blocker';
        touch($file);

        $this->expectException(GeneratorException::class);
        $this->expectExceptionMessage('Cannot create output directory');

        $config = new GeneratorConfig(source: 'spec.json', root: $file);
        (new Emitter($config))->emitModels(self::components());
    }

    #[Test]
    public function a_missing_emitted_file_is_reported_rather_than_silently_skipped(): void
    {
        $this->expectException(GeneratorException::class);
        $this->expectExceptionMessage('Emitter did not write the expected file');

        (new Emitter($this->config()))->normalize([$this->temp() . '/src/Models/Absent.php']);
    }

    #[Test]
    public function a_component_with_no_filename_is_refused(): void
    {
        $components = self::components();
        $components['Models']['Ghost'] = ['properties' => [], 'constants' => []];

        $this->expectException(GeneratorException::class);
        $this->expectExceptionMessage('built without a filename');

        (new Emitter($this->config()))->emitModels($components);
    }

    // ─── Formatting ────────────────────────────────────────────────────

    #[Test]
    public function the_formatter_receives_the_written_files(): void
    {
        $seen = [];
        $formatter = function (array $files) use (&$seen): void {
            $seen = $files;
        };

        $emitter = new Emitter($this->config(), Closure::fromCallable($formatter));

        self::assertTrue($emitter->format(['/a.php', '/b.php']));
        self::assertSame(['/a.php', '/b.php'], $seen);
    }

    #[Test]
    public function no_formatter_means_no_formatting(): void
    {
        self::assertFalse((new Emitter($this->config()))->format(['/a.php']));
    }

    #[Test]
    public function a_dry_run_never_formats(): void
    {
        $formatter = static function (): void {
            self::fail('a dry run must not format');
        };

        self::assertFalse((new Emitter($this->config(true), $formatter))->format(['/a.php']));
    }

    #[Test]
    public function an_empty_file_list_is_not_formatted(): void
    {
        $formatter = static function (): void {
            self::fail('nothing to format');
        };

        self::assertFalse((new Emitter($this->config(), $formatter))->format([]));
    }

    #[Test]
    public function php_cs_fixer_is_null_when_the_binary_or_config_is_absent(): void
    {
        self::assertNull(Emitter::phpCsFixer($this->temp()));
    }

    #[Test]
    public function php_cs_fixer_is_found_in_this_repository(): void
    {
        self::assertNotNull(Emitter::phpCsFixer(dirname(__DIR__, 3)));
    }

    #[Test]
    public function the_real_php_cs_fixer_leaves_normalized_output_untouched(): void
    {
        // The Normalizer's output is meant to already satisfy the repo's own
        // style rules, so running the real fixer over it must change nothing.
        $files = (new Emitter($this->config()))->emitModels(self::components());
        $before = array_map(static fn(string $file): string => (string) file_get_contents($file), $files);

        $formatter = Emitter::phpCsFixer(dirname(__DIR__, 3));
        self::assertNotNull($formatter);
        $formatter($files);

        $after = array_map(static fn(string $file): string => (string) file_get_contents($file), $files);

        self::assertSame($before, $after);
    }
}
