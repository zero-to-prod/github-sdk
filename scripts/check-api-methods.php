#!/usr/bin/env php
<?php

declare(strict_types=1);

require dirname(__DIR__).'/vendor/autoload.php';
require __DIR__.'/manifest.php';

$adminApi = manifestClass('Internal\\AdminApi');
$apiClass = manifestString('api_class');
$apiFqcn  = manifestClass($apiClass);

$ref = new ReflectionEnum(manifestClass('ApiRoute'));

// Collect expected @method lines from #[AdminApi] attributes
$expected = [];
foreach ($ref->getCases() as $case) {
    foreach ($case->getAttributes($adminApi) as $attr) {
        /** @var object{method: object, name: string, pathParams: string[], queryParams: string[], request: ?string, response: ?string, listOf: ?string} $admin */
        $admin = $attr->newInstance();

        // Same naming rule the generator uses, so a model whose short name
        // would shadow a package class is expected fully qualified here too.
        $type = static fn (string $declared): string => manifestMethodType(
            (string) $adminApi::shortName($declared),
            (string) $adminApi::defaultFqcn($declared),
        )[0];

        $params = [];
        foreach ($admin->pathParams as $p) {
            $params[] = 'string $'.manifestParamName($p);
        }
        if ($admin->request !== null) {
            $params[] = $type($admin->request).'|array<string, mixed> $data = []';
        }
        $params[] = 'array<string, mixed> $options = []';

        // `listOf` means the body is a bare JSON array of that class; `response`
        // means one object. They are mutually exclusive — `listOf` wins.
        if ($admin->listOf !== null) {
            $returnType = 'ApiResult<array<int, ' . $type($admin->listOf) . '>>|Response';
        } elseif ($admin->response !== null) {
            $returnType = 'ApiResult<' . $type($admin->response) . '>|Response';
        } else {
            $returnType = 'ApiResult<null>|Response';
        }

        $signature = '@method ' . $returnType . ' ' . $admin->name . '(' . implode(', ', $params) . ')';
        if ($admin->queryParams !== []) {
            $signature .= ' Query: ' . implode(', ', $admin->queryParams);
        }
        $expected[] = $signature;
    }
}

if ($expected === []) {
    echo "No #[AdminApi] attributes found.\n";
    exit(0);
}

// Parse existing @method lines from the API class docblock
$apiRef = new ReflectionClass($apiFqcn);
$doc = $apiRef->getDocComment() ?: '';
$docLines = array_map('trim', explode("\n", $doc));

$missing = [];
foreach ($expected as $line) {
    $found = false;
    foreach ($docLines as $docLine) {
        if (str_contains($docLine, trim($line))) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        $missing[] = $line;
    }
}

if ($missing !== []) {
    fwrite(STDERR, "$apiClass @method annotations are out of date. Run: ./run generate-api-methods\n\n");
    fwrite(STDERR, "Missing or stale:\n");
    foreach ($missing as $line) {
        fwrite(STDERR, "  $line\n");
    }
    exit(1);
}

echo "All " . count($expected) . " admin API @method annotations are up to date.\n";
