<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Generator;

use Closure;

/**
 * Refuses to overwrite hand edits.
 *
 * A run rewrites all of `src/Models/` and `src/ApiRoute.php`. If someone has
 * tweaked a generated model and not committed it, regenerating would destroy the
 * change with nothing to recover from — so the run stops unless `--force` says
 * otherwise.
 *
 * @internal
 */
final class Guard
{
    /**
     * Paths with uncommitted changes among those about to be overwritten.
     *
     * `$runner` receives a shell command and returns its stdout, so this is
     * testable without a repository.
     *
     * @param  list<string>            $paths
     * @param  Closure(string): string $runner
     * @return list<string>
     */
    public static function dirty(string $root, array $paths, Closure $runner): array
    {
        if ($paths === []) {
            return [];
        }

        $command = 'git -C ' . escapeshellarg($root) . ' status --porcelain -- '
            . implode(' ', array_map(escapeshellarg(...), $paths));

        $dirty = [];

        foreach (explode("\n", $runner($command)) as $line) {
            // Porcelain v1: two status columns, a space, then the path.
            $path = trim(substr($line, 3));

            if ($path !== '') {
                $dirty[] = $path;
            }
        }

        sort($dirty);

        return $dirty;
    }

    /**
     * @param  list<string> $paths
     * @throws GeneratorException when anything is dirty and `$force` is false.
     */
    public static function assertClean(string $root, array $paths, Closure $runner, bool $force): void
    {
        if ($force) {
            return;
        }

        $dirty = self::dirty($root, $paths, $runner);

        if ($dirty === []) {
            return;
        }

        throw new GeneratorException(
            "Refusing to overwrite uncommitted changes:\n"
            . implode("\n", array_map(static fn(string $path): string => "  $path", $dirty))
            . "\n\nCommit or stash them first, or pass --force to overwrite.",
        );
    }
}
