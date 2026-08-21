#!/usr/bin/env php
<?php

declare(strict_types=1);

require dirname(__DIR__).'/vendor/autoload.php';
require __DIR__.'/manifest.php';

$hasRoute = manifestClass('Internal\\HasRoute');
$enumName = 'ApiRoute';

$ref = new ReflectionEnum(manifestClass($enumName));
$routeClass = (new ReflectionClass(manifestClass('Internal\\Route')))->getShortName();

// Collect cases with #[HasRoute]
$methods = [];
foreach ($ref->getCases() as $case) {
    $attrs = $case->getAttributes($hasRoute);
    if ($attrs === []) {
        continue;
    }
    $methods[] = " * @method static $routeClass {$case->getName()}(array<string, mixed> \$params = [])";
}

if ($methods === []) {
    echo "No #[HasRoute] cases found.\n";
    exit(0);
}

// Read the ApiRoute file
$file = $ref->getFileName();
if ($file === false) {
    fwrite(STDERR, "Cannot locate $enumName file.\n");
    exit(1);
}

$contents = file_get_contents($file);
if ($contents === false) {
    fwrite(STDERR, "Cannot read $file\n");
    exit(1);
}

// Build the new docblock
$methodBlock = implode("\n", $methods);
$newDoc = "/**\n$methodBlock\n */";

// Replace existing class docblock or insert before the enum declaration
$enumPattern = 'enum\s+'.preg_quote($enumName, '#');

if (preg_match('#/\*\*[\s\S]*?\*/\s*'.$enumPattern.'#', $contents)) {
    // Replace existing docblock above the enum
    $contents = preg_replace(
        '#/\*\*[\s\S]*?\*/(\s*'.$enumPattern.')#',
        "$newDoc\$1",
        $contents,
        1
    );
} else {
    // No docblock — insert before enum
    $contents = preg_replace(
        '#(\s*'.$enumPattern.')#',
        "\n$newDoc\$1",
        $contents,
        1
    );
}

file_put_contents($file, $contents);

$count = count($methods);
echo "Generated $count @method annotation(s) on $enumName enum.\n";
