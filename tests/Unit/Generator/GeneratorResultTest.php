<?php

namespace Unit\Generator;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\Sdk\Generator\GeneratorResult;
use Zerotoprod\Sdk\Generator\Skip;

class GeneratorResultTest extends TestCase
{
    #[Test]
    public function a_clean_run_reports_zero_skipped(): void
    {
        $result = new GeneratorResult(3, 1, 2, 5, ['/a.php'], [], formatted: true);

        self::assertSame(
            implode("\n", [
                'Generated:',
                '  models      3',
                '  enums       1',
                '  routes      2',
                '  operations  5',
                '  files       1',
                '  formatted   php-cs-fixer',
                '  skipped     0',
            ]),
            $result->summary(),
        );
    }

    #[Test]
    public function a_dry_run_says_so_and_notes_a_missing_formatter(): void
    {
        $summary = (new GeneratorResult(1, 0, 1, 1, [], [], dryRun: true))->summary();

        self::assertStringContainsString('Plan (dry run — nothing written):', $summary);
        self::assertStringContainsString('formatted   n/a (dry run)', $summary);
    }

    #[Test]
    public function a_normal_run_without_a_formatter_says_why(): void
    {
        self::assertSame(
            'no (php-cs-fixer unavailable)',
            (new GeneratorResult(0, 0, 0, 0, [], []))->formatterNote(),
        );
    }

    #[Test]
    public function reused_inline_enums_are_noted_beside_the_enum_count(): void
    {
        self::assertStringContainsString(
            '  enums       2 (7 inline duplicate(s) reused)',
            (new GeneratorResult(0, 2, 0, 0, [], [], reusedEnums: 7))->summary(),
        );
    }

    #[Test]
    public function pruned_classes_are_reported_as_one_line_beside_the_counts(): void
    {
        $summary = (new GeneratorResult(4, 1, 2, 5, [], [], pruned: 2173))->summary();

        self::assertStringContainsString(
            "  enums       1\n  pruned      2173 (unreachable from paths; pass --webhooks to include)\n  routes      2",
            $summary,
        );
    }

    #[Test]
    public function nothing_pruned_says_nothing(): void
    {
        self::assertStringNotContainsString('pruned', (new GeneratorResult(4, 1, 2, 5, [], []))->summary());
    }

    #[Test]
    public function swept_files_are_reported_beside_the_model_count(): void
    {
        $summary = (new GeneratorResult(4, 1, 2, 5, [], [], deleted: 11))->summary();

        self::assertStringContainsString(
            "  models      4\n  deleted     11 (stale models and factories; retain_models kept)\n  enums       1",
            $summary,
        );
    }

    #[Test]
    public function nothing_deleted_says_nothing(): void
    {
        self::assertStringNotContainsString('deleted', (new GeneratorResult(4, 1, 2, 5, [], []))->summary());
    }

    #[Test]
    public function skips_are_counted_by_kind(): void
    {
        $result = new GeneratorResult(0, 0, 0, 0, [], [
            new Skip(Skip::ENUM, 'a', 'r'),
            new Skip(Skip::SCHEMA, 'b', 'r'),
            new Skip(Skip::ENUM, 'c', 'r'),
        ]);

        self::assertSame(['enum' => 2, 'schema' => 1], $result->skipCounts());
        self::assertStringContainsString("  skipped     3\n    enum       2\n    schema     1", $result->summary());
    }

    #[Test]
    public function the_skip_report_lists_every_entry(): void
    {
        $result = new GeneratorResult(0, 0, 0, 0, [], [
            new Skip(Skip::ENUM, 'mixed-enum', 'values are mixed-type'),
            new Skip(Skip::PATH, '/x', 'no operations'),
        ]);

        self::assertSame(
            "  [enum] mixed-enum — values are mixed-type\n  [path] /x — no operations",
            $result->skipReport(),
        );
    }
}
