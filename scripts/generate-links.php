<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';
require __DIR__ . '/manifest.php';

$docsBase = manifestString('docs_url');
$apiRoute = manifestClass('ApiRoute');
$rootDir  = dirname(__DIR__);
$srcDir   = "$rootDir/src";

$totalAdded   = 0;
$totalSkipped = 0;

// ─── Process ApiRoute enum cases ───────────────────────────────────

processApiRouteCases("$srcDir/ApiRoute.php", $apiRoute, $docsBase, $totalAdded, $totalSkipped);

// ─── Process Model classes ─────────────────────────────────────────

processModelClasses("$srcDir/Models", $docsBase, $totalAdded, $totalSkipped);

echo "\nAdded $totalAdded @link annotation(s), skipped $totalSkipped existing.\n";


// ─── Functions ─────────────────────────────────────────────────────

/** Add @link to each ApiRoute enum case. */
function processApiRouteCases(string $file, string $apiRoute, string $docsBase, int &$totalAdded, int &$totalSkipped): void
{
    if (!is_file($file)) {
        return;
    }

    $lines = file($file);
    if ($lines === false) {
        return;
    }

    $ref      = new ReflectionEnum($apiRoute);
    $elements = [];

    foreach ($ref->getCases() as $case) {
        $line = findCaseLine($lines, $case->getName());
        if ($line === null) {
            continue;
        }
        $elements[] = ['line' => $line, 'url' => $docsBase];
    }

    usort($elements, static fn($a, $b) => $a['line'] <=> $b['line']);

    $changed = false;
    foreach (array_reverse($elements) as $el) {
        $doc = findDocBlock($lines, $el['line']);

        if ($doc !== null && hasLink($lines, $doc['start'], $doc['end'])) {
            $totalSkipped++;
            continue;
        }

        $changed = true;
        $totalAdded++;
        $url = $el['url'];

        if ($doc !== null && $doc['start'] === $doc['end']) {
            $idx     = $doc['start'] - 1;
            $indent  = getIndent($lines[$idx]);
            $content = trim($lines[$idx]);
            $content = preg_replace('#^/\*\*\s*#', '', $content);
            $content = preg_replace('#\s*\*/$#', '', $content);
            $content = trim((string) $content);

            array_splice($lines, $idx, 1, [
                "$indent/**\n",
                "$indent * $content\n",
                "$indent * @link $url\n",
                "$indent */\n",
            ]);
        } elseif ($doc !== null) {
            $pos    = findInsertPosition($lines, $doc['start'], $doc['end']);
            $indent = getIndent($lines[$doc['start'] - 1]);
            array_splice($lines, $pos, 0, ["$indent * @link $url\n"]);
        } else {
            $idx    = $el['line'] - 1;
            $indent = getIndent($lines[$idx]);
            array_splice($lines, $idx, 0, ["$indent/** @link $url */\n"]);
        }
    }

    if ($changed) {
        file_put_contents($file, implode('', $lines));
        echo "  Updated: src/ApiRoute.php\n";
    }
}

/** Add @link to each model class docblock. */
function processModelClasses(string $modelsDir, string $docsBase, int &$totalAdded, int &$totalSkipped): void
{
    if (!is_dir($modelsDir)) {
        return;
    }

    $iterator = new DirectoryIterator($modelsDir);

    foreach ($iterator as $fileInfo) {
        if ($fileInfo->getExtension() !== 'php') {
            continue;
        }

        $file = $fileInfo->getPathname();
        $lines = file($file);
        if ($lines === false) {
            continue;
        }

        $declLine = null;
        foreach ($lines as $i => $line) {
            if (preg_match('/^(?:abstract\s+|final\s+|readonly\s+)*(?:class|interface|enum)\s+(\w+)/m', $line)) {
                $declLine = $i + 1;
                break;
            }
        }

        if ($declLine === null) {
            continue;
        }

        $doc = findDocBlock($lines, $declLine);

        if ($doc !== null && hasLink($lines, $doc['start'], $doc['end'])) {
            $totalSkipped++;
            continue;
        }

        $totalAdded++;

        if ($doc !== null && $doc['start'] === $doc['end']) {
            $idx     = $doc['start'] - 1;
            $indent  = getIndent($lines[$idx]);
            $content = trim($lines[$idx]);
            $content = preg_replace('#^/\*\*\s*#', '', $content);
            $content = preg_replace('#\s*\*/$#', '', $content);
            $content = trim((string) $content);

            array_splice($lines, $idx, 1, [
                "$indent/**\n",
                "$indent * $content\n",
                "$indent * @link $docsBase\n",
                "$indent */\n",
            ]);
        } elseif ($doc !== null) {
            $pos    = findInsertPosition($lines, $doc['start'], $doc['end']);
            $indent = getIndent($lines[$doc['start'] - 1]);
            array_splice($lines, $pos, 0, ["$indent * @link $docsBase\n"]);
        } else {
            $idx    = $declLine - 1;
            $indent = getIndent($lines[$idx]);
            array_splice($lines, $idx, 0, ["$indent/** @link $docsBase */\n"]);
        }

        file_put_contents($file, implode('', $lines));
    }

    echo "  Updated: src/Models/ (" . count(glob("$modelsDir/*.php") ?: []) . " files)\n";
}


// ─── Shared helpers ────────────────────────────────────────────────

function findCaseLine(array $lines, string $caseName): ?int
{
    foreach ($lines as $i => $line) {
        if (preg_match('/\bcase\s+' . preg_quote($caseName, '/') . '\b/', $line)) {
            return $i + 1;
        }
    }
    return null;
}

/**
 * Locate the docblock above a declaration, skipping #[...] attributes and blank lines.
 *
 * @return array{start: int, end: int}|null  1-indexed line numbers
 */
function findDocBlock(array $lines, int $declarationLine): ?array
{
    $idx = $declarationLine - 2;

    while ($idx >= 0) {
        $trimmed = trim($lines[$idx]);
        if ($trimmed === '' || str_starts_with($trimmed, '#[')) {
            $idx--;
            continue;
        }
        break;
    }

    if ($idx < 0 || !str_ends_with(trim($lines[$idx]), '*/')) {
        return null;
    }

    $end = $idx + 1;

    while ($idx >= 0) {
        if (str_contains($lines[$idx], '/**')) {
            return ['start' => $idx + 1, 'end' => $end];
        }
        $idx--;
    }

    return null;
}

function hasLink(array $lines, int $start, int $end): bool
{
    for ($i = $start - 1; $i < $end; $i++) {
        if (str_contains($lines[$i], '@link')) {
            return true;
        }
    }
    return false;
}

/**
 * Find where to splice a @link line inside a multi-line docblock.
 *
 * @return int 0-indexed position for array_splice
 */
function findInsertPosition(array $lines, int $docStart, int $docEnd): int
{
    $start = $docStart - 1;
    $end   = $docEnd - 1;

    $lastLinkIdx = null;
    $firstTagIdx = null;

    for ($i = $start; $i <= $end; $i++) {
        if (str_contains($lines[$i], '@link')) {
            $lastLinkIdx = $i;
        }
        if ($firstTagIdx === null && preg_match('/@(param|return|throws|var|see)\b/', $lines[$i])) {
            $firstTagIdx = $i;
        }
    }

    if ($lastLinkIdx !== null) {
        return $lastLinkIdx + 1;
    }
    if ($firstTagIdx !== null) {
        return $firstTagIdx;
    }
    return $end;
}

function getIndent(string $line): string
{
    preg_match('/^(\s*)/', $line, $m);
    return $m[1] ?? '';
}
