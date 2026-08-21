<?php

namespace Tests\Unit\Generator;

use Tests\TestCase;
use Zerotoprod\GitHubSdk\Generator\Document;
use Zerotoprod\GitHubSdk\Generator\Generator;
use Zerotoprod\GitHubSdk\Generator\GeneratorConfig;
use Zerotoprod\GitHubSdk\Generator\GeneratorResult;

/**
 * Shared plumbing for the generator tests: fixture paths and a scratch
 * directory that is torn down after each test.
 *
 * Lives in the `Tests\` namespace rather than `Unit\` alongside its subclasses
 * because PHPUnit only loads files matching `*Test.php`; everything else has to
 * come from the composer autoloader, which maps `Tests\` to `tests/`.
 */
abstract class GeneratorCase extends TestCase
{
    private ?string $temp = null;

    protected function tearDown(): void
    {
        if ($this->temp !== null && is_dir($this->temp)) {
            self::remove($this->temp);
        }

        $this->temp = null;

        parent::tearDown();
    }

    /** Absolute path of an OpenAPI fixture. */
    protected static function fixture(string $name): string
    {
        return dirname(__DIR__, 2) . "/Fixtures/openapi/$name";
    }

    /** The parsed document for a fixture. */
    protected static function document(string $name): Document
    {
        return Document::load(self::fixture("$name.json"));
    }

    /** A fresh, empty scratch directory for this test. */
    protected function temp(): string
    {
        if ($this->temp === null) {
            $this->temp = sys_get_temp_dir() . '/sdkgen-' . bin2hex(random_bytes(6));
            mkdir($this->temp, 0o775, true);
        }

        return $this->temp;
    }

    /**
     * Run the full pipeline over a fixture into the scratch directory. No
     * formatter runs: these tests assert the Normalizer's own output, which
     * must already be php-cs-fixer clean.
     */
    protected function generate(
        string $fixture,
        bool $webhooks = false,
        bool $models = true,
        bool $routes = true,
        bool $prune = true,
    ): GeneratorResult {
        return Generator::run(new GeneratorConfig(
            source: self::fixture("$fixture.json"),
            root: $this->temp(),
            models: $models,
            routes: $routes,
            webhooks: $webhooks,
            prune: $prune,
        ));
    }

    /** Contents of a generated model file. */
    protected function model(string $class): string
    {
        $path = $this->temp() . "/src/Models/$class.php";
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    /** Model class names generated, sorted. @return list<string> */
    protected function models(): array
    {
        $names = array_map(
            static fn(string $path): string => basename($path, '.php'),
            glob($this->temp() . '/src/Models/*.php') ?: [],
        );
        sort($names);

        return $names;
    }

    /** Assert a file is syntactically valid PHP. */
    protected static function assertLints(string $path): void
    {
        exec(escapeshellarg(PHP_BINARY) . ' -l ' . escapeshellarg($path) . ' 2>&1', $output, $status);
        self::assertSame(0, $status, "php -l failed for $path:\n" . implode("\n", $output));
    }

    /** Reason strings from a result's skip list. @return list<string> */
    protected static function reasons(GeneratorResult $result): array
    {
        return array_map(static fn(object $skip): string => (string) $skip, $result->skips);
    }

    private static function remove(string $directory): void
    {
        foreach (scandir($directory) ?: [] as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }

            $path = "$directory/$entry";
            is_dir($path) ? self::remove($path) : unlink($path);
        }

        rmdir($directory);
    }
}
