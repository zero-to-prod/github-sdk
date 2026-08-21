<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Generator;

use Closure;
use Zerotoprod\DataModelGenerator\Engine;
use Zerotoprod\DataModelGenerator\Models\Components;
use Zerotoprod\DataModelGenerator\Models\Config;

/**
 * Writes the files.
 *
 * Models and enums go through the data-model generator's `Engine`, which writes
 * to disk itself — so this reads each file straight back and runs it through the
 * {@see Normalizer} rather than trying to intercept the render. `src/ApiRoute.php`
 * is rendered directly by {@see ApiRouteRenderer}.
 *
 * The `properties` and `constants` config blocks are mandatory: leave either out
 * and the Engine emits classes with no members at all.
 *
 * @internal
 */
final class Emitter
{
    public function __construct(
        private readonly GeneratorConfig $config,
        private readonly ?Closure $formatter = null,
    ) {}

    /**
     * Delete the models this run does not own, and the factories that belonged
     * to them.
     *
     * A run rewrites `src/Models/` as a whole, but the data-model generator only
     * ever *adds* files: without this, every model from a previous document — or
     * from the template's shipped example domain — would linger as an orphan no
     * route references. So everything under `src/Models/` goes except the
     * hand-written classes named in `retain_models` (`Errors`, `Pagination`,
     * `Query`), and for each model removed, `factories/<Model>Factory.php` goes
     * with it. Keying the factory sweep off the models actually deleted is what
     * keeps `ErrorsFactory`, `PaginationFactory` and the config factory — which
     * is not named after a model at all — safe.
     *
     * On a dry run nothing is unlinked; the paths are still returned so the plan
     * can report them.
     *
     * @param  list<string> $retain Short class names to keep.
     * @return list<string> Absolute paths removed, sorted.
     */
    public function sweep(array $retain): array
    {
        $removed = [];

        foreach (glob($this->config->modelsDirectory() . '/*.php') ?: [] as $model) {
            if (in_array(basename($model, '.php'), $retain, true)) {
                continue;
            }

            $removed[] = $model;

            $factory = $this->config->factoriesDirectory() . '/' . basename($model, '.php') . 'Factory.php';

            if (is_file($factory)) {
                $removed[] = $factory;
            }
        }

        sort($removed);

        if (!$this->config->dryRun) {
            foreach ($removed as $path) {
                unlink($path);
            }
        }

        return $removed;
    }

    /**
     * Emit models and enums. Returns the absolute paths written.
     *
     * @param  array{Models: array<string, array<string, mixed>>, Enums: array<string, array<string, mixed>>} $components
     * @return list<string>
     */
    public function emitModels(array $components): array
    {
        $directory = $this->config->modelsDirectory();
        $files = [];

        foreach ([...array_values($components['Models']), ...array_values($components['Enums'])] as $component) {
            $filename = Json::str($component['filename'] ?? null);

            if ($filename === null) {
                throw new GeneratorException('A component was built without a filename — refusing to emit it.');
            }

            $files[] = "$directory/$filename";
        }

        if ($this->config->dryRun) {
            return $files;
        }

        $this->ensureDirectory($directory);

        Engine::generate(
            Components::from($components),
            Config::from([
                'model' => [
                    'directory' => $directory,
                    'namespace' => $this->config->modelNamespace(),
                    'comments' => true,
                    // Without these two the Engine emits empty classes.
                    'constants' => ['comments' => true, 'type' => false, 'visibility' => 'public'],
                    'properties' => ['comments' => true, 'visibility' => 'public', 'nullable' => false],
                ],
            ]),
        );

        $this->normalize($files);

        return $files;
    }

    /**
     * Rewrite each emitted file in the house style. Separate from the emit so a
     * file the Engine failed to write is reported rather than half-processed.
     *
     * @param list<string> $files
     */
    public function normalize(array $files): void
    {
        foreach ($files as $file) {
            if (!is_file($file)) {
                throw new GeneratorException("Emitter did not write the expected file: $file");
            }

            file_put_contents($file, Normalizer::normalize((string) file_get_contents($file)));
        }
    }

    /** Emit `src/ApiRoute.php`. Returns the path written. */
    public function emitRoutes(RoutePlan $plan): string
    {
        $path = $this->config->apiRoutePath();

        if (!$this->config->dryRun) {
            $this->ensureDirectory(dirname($path));
            file_put_contents(
                $path,
                (new ApiRouteRenderer($this->config->namespace, $this->config->docsUrl))->render($plan),
            );
        }

        return $path;
    }

    /**
     * Run the formatter over the written files. Returns whether it ran — a
     * missing php-cs-fixer is reported, not fatal, because the output is
     * already close to the house style.
     *
     * @param list<string> $files
     */
    public function format(array $files): bool
    {
        if (!$this->formatter instanceof \Closure || $this->config->dryRun || $files === []) {
            return false;
        }

        ($this->formatter)($files);

        return true;
    }

    /**
     * A formatter that shells out to the repo's own php-cs-fixer with the repo's
     * own config, so generated files are held to exactly the rules hand-written
     * ones are. Null when either the binary or the config is absent.
     */
    public static function phpCsFixer(string $root): ?Closure
    {
        $binary = "$root/vendor/bin/php-cs-fixer";
        $config = "$root/.php-cs-fixer.dist.php";

        if (!is_file($binary) || !is_file($config)) {
            return null;
        }

        return static function (array $files) use ($binary, $config): void {
            $command = implode(' ', [
                escapeshellarg(PHP_BINARY),
                escapeshellarg($binary),
                'fix',
                '--using-cache=no',
                '--path-mode=override',
                '--config=' . escapeshellarg($config),
                implode(' ', array_map(escapeshellarg(...), $files)),
                '2>&1',
            ]);

            exec($command);
        };
    }

    private function ensureDirectory(string $directory): void
    {
        if (!is_dir($directory) && !@mkdir($directory, 0o775, true) && !is_dir($directory)) {
            throw new GeneratorException("Cannot create output directory: $directory");
        }
    }
}
