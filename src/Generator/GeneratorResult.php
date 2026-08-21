<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Generator;

/**
 * What a run produced, and what it did not.
 *
 * The skip list is the point of this object: a generator that quietly drops an
 * `allOf` or an odd enum is worse than one that fails, because the gap only
 * surfaces later as a missing property. Every construct the mappers could not
 * represent is in here with a reason.
 *
 * @internal
 */
final class GeneratorResult
{
    /**
     * @param list<string> $files  Absolute paths written (empty on a dry run).
     * @param list<Skip>   $skips  Everything not emitted the obvious way, and why.
     * @param int          $pruned Classes dropped as unreachable — counted, not listed, because
     *                             a real document prunes them by the thousand.
     * @param int          $deleted Stale files swept from `src/Models/` and `factories/` before
     *                              writing: models the document no longer declares, and the
     *                              factories that belonged to them.
     */
    public function __construct(
        public readonly int $models,
        public readonly int $enums,
        public readonly int $routes,
        public readonly int $operations,
        public readonly array $files,
        public readonly array $skips,
        public readonly bool $dryRun = false,
        public readonly bool $formatted = false,
        public readonly int $reusedEnums = 0,
        public readonly int $pruned = 0,
        public readonly int $deleted = 0,
    ) {}

    /** How the output was formatted, or why it was not. */
    public function formatterNote(): string
    {
        if ($this->formatted) {
            return 'php-cs-fixer';
        }

        return $this->dryRun ? 'n/a (dry run)' : 'no (php-cs-fixer unavailable)';
    }

    /**
     * Skips grouped by kind, for a compact report.
     *
     * @return array<string, int>
     */
    public function skipCounts(): array
    {
        $counts = [];

        foreach ($this->skips as $skip) {
            $counts[$skip->kind] = ($counts[$skip->kind] ?? 0) + 1;
        }

        ksort($counts);

        return $counts;
    }

    /** A human-readable run summary, one construct per line. */
    public function summary(): string
    {
        $lines = [
            $this->dryRun ? 'Plan (dry run — nothing written):' : 'Generated:',
            sprintf('  models      %d', $this->models),
            ...($this->deleted > 0
                ? [sprintf('  deleted     %d (stale models and factories; retain_models kept)', $this->deleted)]
                : []),
            sprintf('  enums       %d%s', $this->enums, $this->reusedEnums > 0 ? " ({$this->reusedEnums} inline duplicate(s) reused)" : ''),
            ...($this->pruned > 0
                ? [sprintf('  pruned      %d (unreachable from paths; pass --webhooks to include)', $this->pruned)]
                : []),
            sprintf('  routes      %d', $this->routes),
            sprintf('  operations  %d', $this->operations),
            sprintf('  files       %d', count($this->files)),
            sprintf('  formatted   %s', $this->formatterNote()),
        ];

        $counts = $this->skipCounts();

        if ($counts === []) {
            return implode("\n", [...$lines, '  skipped     0']);
        }

        $lines[] = sprintf('  skipped     %d', count($this->skips));

        foreach ($counts as $kind => $count) {
            $lines[] = sprintf('    %-10s %d', $kind, $count);
        }

        return implode("\n", $lines);
    }

    /** The full skip list, one per line, for `--verbose` style output. */
    public function skipReport(): string
    {
        return implode("\n", array_map(static fn(Skip $skip): string => "  $skip", $this->skips));
    }
}
