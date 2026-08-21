<?php

namespace Unit\Generator;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\GitHubSdk\Generator\CliOptions;
use Zerotoprod\GitHubSdk\Generator\GeneratorException;

class CliOptionsTest extends TestCase
{
    #[Test]
    public function it_defaults_to_everything_off(): void
    {
        $options = CliOptions::parse([]);

        self::assertNull($options->source);
        self::assertNull($options->out);
        self::assertFalse($options->modelsOnly);
        self::assertFalse($options->routesOnly);
        self::assertFalse($options->webhooks);
        self::assertFalse($options->allSchemas);
        self::assertFalse($options->dryRun);
        self::assertFalse($options->force);
        self::assertFalse($options->verbose);
        self::assertTrue($options->writesModels());
        self::assertTrue($options->writesRoutes());
    }

    #[Test]
    public function it_reads_a_positional_source(): void
    {
        self::assertSame('spec.json', CliOptions::parse(['spec.json'])->source);
    }

    #[Test]
    public function it_reads_every_flag(): void
    {
        $options = CliOptions::parse(['--webhooks', '--all-schemas', '--dry-run', '--force', '--verbose', '--out=/tmp/x']);

        self::assertTrue($options->webhooks);
        self::assertTrue($options->allSchemas);
        self::assertTrue($options->dryRun);
        self::assertTrue($options->force);
        self::assertTrue($options->verbose);
        self::assertSame('/tmp/x', $options->out);
    }

    #[Test]
    public function models_only_suppresses_routes(): void
    {
        $options = CliOptions::parse(['--models-only']);

        self::assertTrue($options->writesModels());
        self::assertFalse($options->writesRoutes());
    }

    #[Test]
    public function routes_only_suppresses_models(): void
    {
        $options = CliOptions::parse(['--routes-only']);

        self::assertFalse($options->writesModels());
        self::assertTrue($options->writesRoutes());
    }

    #[Test]
    public function the_two_only_flags_are_mutually_exclusive(): void
    {
        $this->expectException(GeneratorException::class);
        $this->expectExceptionMessage('mutually exclusive');

        CliOptions::parse(['--models-only', '--routes-only']);
    }

    #[Test]
    public function an_unknown_option_is_rejected_with_usage(): void
    {
        $this->expectException(GeneratorException::class);
        $this->expectExceptionMessage('Unknown option: --nope');

        CliOptions::parse(['--nope']);
    }

    #[Test]
    public function a_second_positional_argument_is_rejected(): void
    {
        $this->expectException(GeneratorException::class);
        $this->expectExceptionMessage('Unexpected extra argument: b.json');

        CliOptions::parse(['a.json', 'b.json']);
    }
}
