<?php

namespace Unit;

use FilesystemIterator;
use PHPUnit\Framework\Attributes\Test;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;
use Tests\TestCase;

/**
 * `init` rebrands the template into a concrete package and then deletes itself,
 * so it gets exactly one chance to be correct. Every test here copies the parts
 * of the repository that carry a template name into a throwaway directory and
 * drives the real script non-interactively.
 */
class InitTest extends TestCase
{
    /**
     * Paths copied into the sandbox. Enough of the repository to exercise the
     * textual pass, every rename, and both structural rewrites.
     */
    private const COPY = [
        'init',
        'composer.json',
        'sdk.json',
        '.gitattributes',
        'README.md',
        'CLAUDE.md',
        'src',
        'factories',
        'bin',
        'scripts',
        'docs',
        'tests/TestCase.php',
        'tests/Fixtures',
        'tests/Unit/ConfigTest.php',
        'tests/Unit/SdkApiTest.php',
        'tests/Unit/InitTest.php',
        'tests/Unit/ReadmeExamplesTest.php',
        'tests/Unit/ExampleDomainTest.php',
    ];

    /** Files init removes because they only make sense in the template. */
    private const TEMPLATE_ONLY = [
        'tests/Unit/InitTest.php',
        'tests/Unit/ReadmeExamplesTest.php',
        'tests/Unit/ExampleDomainTest.php',
    ];

    private const ANSWERS = [
        'slug' => 'github-api',
        'vendor' => 'zero-to-prod',
        'title' => 'GitHub API',
        'description' => 'PHP SDK for the GitHub REST API',
        'base_url' => 'https://api.github.com',
        'docs_url' => 'https://docs.github.com/rest',
        'openapi_source' => 'openapi/github.json',
        'author' => 'Ada Lovelace',
        'author_email' => 'ada@example.com',
    ];

    /** @var list<string> */
    private array $sandboxes = [];

    protected function tearDown(): void
    {
        foreach ($this->sandboxes as $sandbox) {
            $this->delete($sandbox);
        }

        $this->sandboxes = [];

        parent::tearDown();
    }

    #[Test]
    public function rewrites_composer_json(): void
    {
        $sandbox = $this->initialise();

        $composer = $this->json($sandbox . '/composer.json');

        self::assertSame('zero-to-prod/github-api', $composer['name']);
        self::assertSame('PHP SDK for the GitHub REST API', $composer['description']);
        self::assertSame(['Zerotoprod\\GithubApi\\' => 'src/'], $composer['autoload']['psr-4']);
        self::assertSame(
            ['Tests\\' => 'tests/', 'Zerotoprod\\GithubApi\\Factories\\' => 'factories/'],
            $composer['autoload-dev']['psr-4'],
        );
        self::assertSame(['bin/github-api'], $composer['bin']);
        self::assertSame([['name' => 'Ada Lovelace', 'email' => 'ada@example.com']], $composer['authors']);
        self::assertSame('https://github.com/zero-to-prod/github-api', $composer['homepage']);
        self::assertSame('https://github.com/zero-to-prod/github-api/issues', $composer['support']['issues']);
    }

    #[Test]
    public function composer_json_keeps_name_first_and_stays_valid_json(): void
    {
        $sandbox = $this->initialise();

        $contents = (string) file_get_contents($sandbox . '/composer.json');
        $composer = $this->json($sandbox . '/composer.json');

        self::assertSame('name', array_key_first($composer));
        self::assertStringStartsWith('{' . "\n" . '    "name"', $contents);
        self::assertStringEndsWith("}\n", $contents);
        self::assertStringNotContainsString('\/', $contents);
    }

    #[Test]
    public function rewrites_sdk_json_and_preserves_unknown_keys(): void
    {
        $sandbox = $this->initialise(static function (string $sandbox): void {
            $json = json_decode((string) file_get_contents($sandbox . '/sdk.json'), true);
            $json['unknown_key'] = 'preserve me';
            file_put_contents($sandbox . '/sdk.json', (string) json_encode($json));
        });

        $sdk = $this->json($sandbox . '/sdk.json');

        self::assertSame('zero-to-prod/github-api', $sdk['name']);
        self::assertSame('Zerotoprod\\GithubApi', $sdk['namespace']);
        self::assertSame('GitHub API', $sdk['title']);
        self::assertSame('PHP SDK for the GitHub REST API', $sdk['description']);
        self::assertSame('GithubApi', $sdk['api_class']);
        self::assertSame('GithubConfig', $sdk['config_class']);
        self::assertSame('github-api', $sdk['bin']);
        self::assertSame('https://api.github.com', $sdk['base_url']);
        self::assertSame('https://docs.github.com/rest', $sdk['docs_url']);
        self::assertSame('openapi/github.json', $sdk['openapi']['source']);

        // Untouched keys survive, including ones the template never defined.
        self::assertSame('preserve me', $sdk['unknown_key']);
        self::assertFalse($sdk['openapi']['include_webhooks']);
        self::assertArrayHasKey('$comment', $sdk);
        self::assertNull($sdk['openapi']['envelope_key']);
    }

    #[Test]
    public function renames_every_file_that_carries_a_template_name(): void
    {
        $sandbox = $this->initialise();

        foreach ([
            'src/GithubApi.php',
            'src/GithubConfig.php',
            'factories/GithubConfigFactory.php',
            'bin/github-api',
            'scripts/github-api',
            'docs/skills/github-api.md',
            'tests/Unit/GithubApiTest.php',
        ] as $path) {
            self::assertFileExists($sandbox . '/' . $path);
        }

        foreach ([
            'src/SdkApi.php',
            'src/SdkConfig.php',
            'factories/SdkConfigFactory.php',
            'bin/sdk',
            'scripts/sdk',
            'docs/skills/sdk.md',
            'tests/Unit/SdkApiTest.php',
        ] as $path) {
            self::assertFileDoesNotExist($sandbox . '/' . $path);
        }

        self::assertTrue(is_executable($sandbox . '/bin/github-api'));
    }

    #[Test]
    public function rewrites_the_namespace_and_class_declarations(): void
    {
        $sandbox = $this->initialise();

        $api = (string) file_get_contents($sandbox . '/src/GithubApi.php');

        self::assertStringContainsString('namespace Zerotoprod\\GithubApi;', $api);
        self::assertStringContainsString('class GithubApi', $api);
        self::assertStringContainsString('use Zerotoprod\\GithubApi\\Internal\\AdminApi;', $api);

        // The escaped form inside PHP and JSON string literals is rewritten too.
        self::assertStringContainsString(
            "'Zerotoprod\\\\GithubApi\\\\Models'",
            (string) file_get_contents($sandbox . '/src/GithubConfig.php'),
        );
    }

    #[Test]
    public function leaves_no_template_identifier_behind(): void
    {
        $sandbox = $this->initialise();

        $offenders = [];

        foreach ($this->files($sandbox) as $file) {
            if (basename($file) === 'answers.json') {
                continue;
            }

            $contents = (string) file_get_contents($file);

            $markdown = substr($file, -3) === '.md';

            foreach (['Zerotoprod\\Sdk', 'SdkApi', 'SdkConfig', 'bin/sdk', 'zero-to-prod/sdk'] as $identifier) {
                // A derived package names its ancestor on purpose: CLAUDE.md
                // and the docs point back at the template it merges from, and
                // scripts/check-template compares against it to tell a derived
                // package from the template. Only code and manifests must be
                // free of the upstream name.
                if ($identifier === 'zero-to-prod/sdk'
                    && ($markdown || basename($file) === 'check-template')) {
                    continue;
                }

                if (strpos($contents, $identifier) !== false) {
                    $offenders[] = substr($file, strlen($sandbox) + 1) . ' (' . $identifier . ')';
                }
            }
        }

        self::assertSame([], $offenders);
    }

    #[Test]
    public function rewrites_the_claude_md_template_intro(): void
    {
        $sandbox = $this->initialise();

        $claude = (string) file_get_contents($sandbox . '/CLAUDE.md');

        // An agent reading a derived package must not be told it is working in
        // the template: every judgement about blast radius follows from that.
        self::assertStringNotContainsString('This repo is the SDK **template**', $claude);
        self::assertStringContainsString('This package was generated from the `zero-to-prod/sdk` template', $claude);
        self::assertStringContainsString('./run check-template', $claude);
        self::assertStringContainsString('docs/template.md', $claude);
    }

    #[Test]
    public function preserves_the_upstream_template_name_in_check_template(): void
    {
        $sandbox = $this->initialise();

        // scripts/check-template compares sdk.json's name against the UPSTREAM
        // package to tell a derived package from the template. Rewriting that
        // constant makes every derived package report "this is the template" and
        // silently drop its ancestry checks from fatal to advisory.
        $script = (string) file_get_contents($sandbox . '/scripts/check-template');

        self::assertStringContainsString('TEMPLATE_PACKAGE="zero-to-prod/sdk"', $script);
        self::assertStringNotContainsString('TEMPLATE_PACKAGE="zero-to-prod/github-api"', $script);
    }

    #[Test]
    public function regenerates_the_claude_md_command_listing(): void
    {
        $sandbox = $this->initialise();

        // The rename itself is unconditional.
        self::assertFileExists($sandbox . '/scripts/github-api');
        self::assertFileDoesNotExist($sandbox . '/scripts/sdk');

        // Regenerating the listing shells out to scripts/generate-claude-md,
        // which is bash, as is the `./run` it reads. The php:*-alpine images the
        // docker services use ship no bash, so inside them `./run` exits 127 and
        // init reports that it could not regenerate rather than pretending. The
        // assertion only means anything where bash exists.
        if (trim((string) shell_exec('command -v bash 2>/dev/null')) === '') {
            self::markTestSkipped('bash is unavailable, so ./run cannot produce the listing.');
        }

        // scripts/sdk is renamed, so ./run's listing changes and the block in
        // CLAUDE.md goes stale -- check-claude-md would fail on an untouched
        // package.
        $claude = (string) file_get_contents($sandbox . '/CLAUDE.md');

        self::assertStringContainsString('github-api', $claude);
        self::assertStringNotContainsString('  sdk ', $claude);
    }

    #[Test]
    public function the_cli_wrapper_description_carries_no_package_identity(): void
    {
        $sandbox = $this->initialise();

        // ./run reads this line for its help listing, and check-claude-md
        // compares that listing against CLAUDE.md. A name baked into the
        // description goes stale the moment the script is renamed.
        $lines = (array) file($sandbox . '/scripts/github-api');

        self::assertSame('# Run the package CLI tool', rtrim((string) ($lines[1] ?? '')));
    }

    #[Test]
    public function deletes_itself_and_its_gitattributes_line(): void
    {
        $sandbox = $this->initialise();

        self::assertFileDoesNotExist($sandbox . '/init');

        $attributes = (string) file_get_contents($sandbox . '/.gitattributes');

        self::assertStringNotContainsString('/init ', $attributes);
        self::assertMatchesRegularExpression('#^/docker/\s+export-ignore#m', $attributes);
    }

    #[Test]
    public function deletes_the_template_only_tests(): void
    {
        $sandbox = $this->initialise();

        foreach (self::TEMPLATE_ONLY as $path) {
            self::assertFileDoesNotExist($sandbox . '/' . $path);
        }
    }

    #[Test]
    public function keeps_every_domain_agnostic_test_and_its_fixtures(): void
    {
        // The shared suite dispatches against tests/Fixtures/FixtureRoute, not
        // the generated ApiRoute, so it must survive intact.
        $sandbox = $this->initialise();

        foreach ([
            'tests/TestCase.php',
            'tests/Unit/ConfigTest.php',
            'tests/Unit/GithubApiTest.php',
            'tests/Fixtures/FixtureRoute.php',
            'tests/Fixtures/Models/FixtureThing.php',
            'tests/Fixtures/Factories/FixtureThingFactory.php',
        ] as $path) {
            self::assertFileExists($sandbox . '/' . $path);
        }
    }

    #[Test]
    public function reports_what_it_removed_and_that_the_readme_needs_rewriting(): void
    {
        $sandbox = $this->sandbox();

        file_put_contents(
            $sandbox . '/answers.json',
            (string) json_encode(self::ANSWERS, JSON_THROW_ON_ERROR),
        );

        [$status, $output] = $this->execute($sandbox, '--answers=answers.json');
        $printed = implode("\n", $output);

        self::assertSame(0, $status, $printed);
        self::assertStringContainsString('Removed:', $printed);
        self::assertStringContainsString('init', $printed);

        foreach (self::TEMPLATE_ONLY as $path) {
            self::assertStringContainsString($path, $printed);
        }

        self::assertStringContainsString('README.md still describes the template', $printed);
    }

    #[Test]
    public function the_rewritten_php_still_parses(): void
    {
        $sandbox = $this->initialise();

        foreach ([
            'src/GithubApi.php',
            'src/GithubConfig.php',
            'factories/GithubConfigFactory.php',
            'tests/Unit/GithubApiTest.php',
            'tests/Unit/ConfigTest.php',
            'tests/Fixtures/FixtureRoute.php',
            'tests/Fixtures/Models/FixtureThingsResponse.php',
            'bin/github-api',
        ] as $path) {
            $output = [];
            $status = 0;
            exec(escapeshellarg(PHP_BINARY) . ' -l ' . escapeshellarg($sandbox . '/' . $path) . ' 2>&1', $output, $status);

            self::assertSame(0, $status, $path . ': ' . implode("\n", $output));
        }
    }

    #[Test]
    public function accepts_every_default_without_prompting(): void
    {
        $sandbox = $this->sandbox();

        [$status, $output] = $this->execute($sandbox, '--defaults');

        self::assertSame(0, $status, implode("\n", $output));
        self::assertFileDoesNotExist($sandbox . '/init');

        $slug = $this->slugify(basename($sandbox));

        self::assertSame($slug, $this->json($sandbox . '/sdk.json')['bin']);
        self::assertStringEndsWith('/' . $slug, $this->json($sandbox . '/composer.json')['name']);
    }

    #[Test]
    public function refuses_to_run_outside_a_template_root(): void
    {
        $sandbox = $this->sandbox(['init', 'composer.json']);

        unlink($sandbox . '/composer.json');
        file_put_contents($sandbox . '/composer.json', '{}');

        [$status, $output] = $this->execute($sandbox, '--defaults');

        self::assertSame(1, $status, implode("\n", $output));
        self::assertStringContainsString('repository root', implode("\n", $output));
        self::assertFileExists($sandbox . '/init');
    }

    /**
     * Copy the template, optionally tamper with the copy, then run init with a
     * fixed set of answers.
     */
    private function initialise(?callable $before = null): string
    {
        $sandbox = $this->sandbox();

        if ($before !== null) {
            $before($sandbox);
        }

        file_put_contents(
            $sandbox . '/answers.json',
            (string) json_encode(self::ANSWERS, JSON_THROW_ON_ERROR),
        );

        [$status, $output] = $this->execute($sandbox, '--answers=answers.json');

        self::assertSame(0, $status, implode("\n", $output));

        return $sandbox;
    }

    /**
     * @return array{0: int, 1: list<string>}
     */
    private function execute(string $sandbox, string $arguments): array
    {
        $output = [];
        $status = 0;

        exec(
            'cd ' . escapeshellarg($sandbox) . ' && ' . escapeshellarg(PHP_BINARY) . ' init ' . $arguments . ' 2>&1',
            $output,
            $status,
        );

        return [$status, $output];
    }

    /** @param list<string>|null $paths */
    private function sandbox(?array $paths = null): string
    {
        $root = dirname(__DIR__, 2);
        $sandbox = sys_get_temp_dir() . '/sdk-init-' . bin2hex(random_bytes(6));

        mkdir($sandbox, 0777, true);

        $this->sandboxes[] = $sandbox;

        foreach ($paths ?? self::COPY as $path) {
            $this->copy($root . '/' . $path, $sandbox . '/' . $path);
        }

        return $sandbox;
    }

    private function copy(string $from, string $to): void
    {
        if (is_dir($from)) {
            mkdir($to, 0777, true);

            foreach (new FilesystemIterator($from, FilesystemIterator::SKIP_DOTS) as $file) {
                /** @var SplFileInfo $file */
                $this->copy($file->getPathname(), $to . '/' . $file->getFilename());
            }

            return;
        }

        self::assertFileExists($from);

        if (! is_dir(dirname($to))) {
            mkdir(dirname($to), 0777, true);
        }

        copy($from, $to);
        chmod($to, is_executable($from) ? 0755 : 0644);
    }

    private function delete(string $path): void
    {
        if (! file_exists($path)) {
            return;
        }

        if (is_file($path) || is_link($path)) {
            unlink($path);

            return;
        }

        foreach (new FilesystemIterator($path, FilesystemIterator::SKIP_DOTS) as $file) {
            /** @var SplFileInfo $file */
            $this->delete($file->getPathname());
        }

        rmdir($path);
    }

    /** @return list<string> */
    private function files(string $root): array
    {
        $files = [];

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS),
        );

        /** @var SplFileInfo $file */
        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $files[] = $file->getPathname();
            }
        }

        return $files;
    }

    /** @return array<string, mixed> */
    private function json(string $path): array
    {
        self::assertFileExists($path);

        /** @var array<string, mixed> $decoded */
        $decoded = json_decode((string) file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);

        return $decoded;
    }

    private function slugify(string $value): string
    {
        return trim(
            (string) preg_replace('/-+/', '-', (string) preg_replace('/[^a-z0-9]+/', '-', strtolower($value))),
            '-',
        );
    }
}
