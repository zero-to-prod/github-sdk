#!/usr/bin/env php
<?php

declare(strict_types=1);

require dirname(__DIR__).'/vendor/autoload.php';
require __DIR__.'/manifest.php';

$hasRoute = manifestClass('Internal\\HasRoute');
$enumName = 'ApiRoute';

$ref = new ReflectionEnum(manifestClass($enumName));
$routeClass = (new ReflectionClass(manifestClass('Internal\\Route')))->getShortName();

// Collect expected @method lines from #[HasRoute] cases
$expected = [];
foreach ($ref->getCases() as $case) {
    if ($case->getAttributes($hasRoute) === []) {
        continue;
    }
    $expected[] = "@method static $routeClass {$case->getName()}(array<string, mixed> \$params = [])";
}

if ($expected === []) {
    echo "No #[HasRoute] cases found.\n";
    exit(0);
}

// Parse existing @method lines from the class docblock
$doc = $ref->getDocComment() ?: '';
preg_match_all('/@method\s+static\s+\S+\s+(\w+)\(.*?\)/', $doc, $matches);
$found = $matches[0] ?? [];

// Check each expected method exists in the docblock
$missing = [];
foreach ($expected as $line) {
    $present = false;
    foreach ($found as $foundLine) {
        if (str_contains($line, $foundLine) || str_contains($foundLine, explode(' ', $line)[3] ?? '')) {
            $present = true;
            break;
        }
    }
    if (!$present) {
        $missing[] = $line;
    }
}

// Also verify the full lines match exactly (catches stale types)
$docLines = array_map('trim', explode("\n", $doc));
$stale = [];
foreach ($expected as $line) {
    $found = false;
    foreach ($docLines as $docLine) {
        if (str_contains($docLine, trim($line))) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        $stale[] = $line;
    }
}

if ($stale !== []) {
    fwrite(STDERR, "Route @method annotations are out of date. Run: ./run generate-routes\n\n");
    fwrite(STDERR, "Missing or stale:\n");
    foreach ($stale as $line) {
        fwrite(STDERR, "  $line\n");
    }
    exit(1);
}

echo "All ".count($expected)." route @method annotations are up to date.\n";
