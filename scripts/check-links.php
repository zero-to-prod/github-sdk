#!/usr/bin/env php
<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';
require __DIR__ . '/manifest.php';

$rootDir = dirname(__DIR__);
$srcDir  = "$rootDir/src";
$missing = [];

// ─── Check ApiRoute enum cases ─────────────────────────────────────

$apiRouteFile = "$srcDir/ApiRoute.php";
$lines = file($apiRouteFile);
if ($lines !== false) {
    $ref = new ReflectionEnum(manifestClass('ApiRoute'));

    foreach ($ref->getCases() as $case) {
        $caseLine = findCaseLine($lines, $case->getName());
        if ($caseLine === null) {
            continue;
        }

        $doc = findDocBlock($lines, $caseLine);
        if ($doc === null || !hasLink($lines, $doc['start'], $doc['end'])) {
            $missing[] = "  src/ApiRoute.php:$caseLine  ApiRoute::{$case->getName()}";
        }
    }
}

// ─── Check Model classes ───────────────────────────────────────────

$modelsDir = "$srcDir/Models";
$iterator  = new DirectoryIterator($modelsDir);

foreach ($iterator as $fileInfo) {
    if ($fileInfo->getExtension() !== 'php') {
        continue;
    }

    $file  = $fileInfo->getPathname();
    $lines = file($file);
    if ($lines === false) {
        continue;
    }

    $declLine  = null;
    $shortName = null;
    foreach ($lines as $i => $line) {
        if (preg_match('/^(?:abstract\s+|final\s+|readonly\s+)*(?:class|interface|enum)\s+(\w+)/m', $line, $m)) {
            $declLine  = $i + 1;
            $shortName = $m[1];
            break;
        }
    }

    if ($declLine === null) {
        continue;
    }

    $doc = findDocBlock($lines, $declLine);
    if ($doc === null || !hasLink($lines, $doc['start'], $doc['end'])) {
        $relativePath = str_replace("$rootDir/", '', $file);
        $missing[] = "  $relativePath:$declLine  $shortName";
    }
}

// ─── Report ────────────────────────────────────────────────────────

if ($missing !== []) {
    fwrite(STDERR, "@link annotations are missing. Run: composer generate-links\n\n");
    fwrite(STDERR, "Missing:\n");
    foreach ($missing as $line) {
        fwrite(STDERR, "$line\n");
    }
    exit(1);
}

// Count total links
$total = 0;
$allFiles = array_merge(
    [$apiRouteFile],
    glob("$modelsDir/*.php") ?: [],
);
foreach ($allFiles as $f) {
    $lines = file($f);
    if ($lines === false) {
        continue;
    }
    foreach ($lines as $line) {
        if (str_contains($line, '@link')) {
            $total++;
        }
    }
}

echo "All $total @link annotations are present.\n";


// ─── Helpers ───────────────────────────────────────────────────────

function findCaseLine(array $lines, string $caseName): ?int
{
    foreach ($lines as $i => $line) {
        if (preg_match('/\bcase\s+' . preg_quote($caseName, '/') . '\b/', $line)) {
            return $i + 1;
        }
    }
    return null;
}

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
