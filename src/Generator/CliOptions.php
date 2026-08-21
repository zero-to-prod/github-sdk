<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Generator;

/**
 * Parsed `composer generate-sdk` arguments.
 *
 * @internal
 */
final class CliOptions
{
    public const USAGE = 'Usage: composer generate-sdk -- [<openapi-path-or-url>] '
        . '[--models-only] [--routes-only] [--webhooks] [--all-schemas] [--dry-run] [--force] [--verbose] [--out=<dir>]';

    public function __construct(
        public readonly ?string $source = null,
        public readonly bool $modelsOnly = false,
        public readonly bool $routesOnly = false,
        public readonly bool $webhooks = false,
        public readonly bool $allSchemas = false,
        public readonly bool $dryRun = false,
        public readonly bool $force = false,
        public readonly bool $verbose = false,
        public readonly ?string $out = null,
    ) {}

    /**
     * Parse argv (without the script name).
     *
     * @param list<string> $arguments
     */
    public static function parse(array $arguments): self
    {
        $source = null;
        $modelsOnly = false;
        $routesOnly = false;
        $webhooks = false;
        $allSchemas = false;
        $dryRun = false;
        $force = false;
        $verbose = false;
        $out = null;

        foreach ($arguments as $argument) {
            if (str_starts_with($argument, '--out=')) {
                $out = substr($argument, strlen('--out='));
                continue;
            }

            if (!str_starts_with($argument, '--')) {
                if ($source !== null) {
                    throw new GeneratorException("Unexpected extra argument: $argument\n" . self::USAGE);
                }

                $source = $argument;
                continue;
            }

            match ($argument) {
                '--models-only' => $modelsOnly = true,
                '--routes-only' => $routesOnly = true,
                '--webhooks' => $webhooks = true,
                '--all-schemas' => $allSchemas = true,
                '--dry-run' => $dryRun = true,
                '--force' => $force = true,
                '--verbose' => $verbose = true,
                default => throw new GeneratorException("Unknown option: $argument\n" . self::USAGE),
            };
        }

        if ($modelsOnly && $routesOnly) {
            throw new GeneratorException('--models-only and --routes-only are mutually exclusive.');
        }

        return new self($source, $modelsOnly, $routesOnly, $webhooks, $allSchemas, $dryRun, $force, $verbose, $out);
    }

    public function writesModels(): bool
    {
        return !$this->routesOnly;
    }

    public function writesRoutes(): bool
    {
        return !$this->modelsOnly;
    }
}
