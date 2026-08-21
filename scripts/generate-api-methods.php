#!/usr/bin/env php
<?php

declare(strict_types=1);

require dirname(__DIR__).'/vendor/autoload.php';
require __DIR__.'/manifest.php';

$adminApi = manifestClass('Internal\\AdminApi');
$apiClass = manifestString('api_class');
$apiFqcn  = manifestClass($apiClass);

$ref = new ReflectionEnum(manifestClass('ApiRoute'));

// Collect @method lines and use-statement imports from #[AdminApi] attributes
$methods = [];
$imports = [];
foreach ($ref->getCases() as $case) {
    foreach ($case->getAttributes($adminApi) as $attr) {
        /** @var object{method: object, name: string, pathParams: string[], queryParams: string[], request: ?string, response: ?string, listOf: ?string} $admin */
        $admin = $attr->newInstance();

        // How a model is named in the annotation, plus the FQCN to import for
        // it. A name that would shadow a class already in the package's root
        // namespace comes back fully qualified and unimportable — see
        // manifestMethodType().
        $type = static function (string $declared) use ($adminApi, &$imports): string {
            [$name, $import] = manifestMethodType(
                (string) $adminApi::shortName($declared),
                (string) $adminApi::defaultFqcn($declared),
            );

            if ($import !== null) {
                $imports[$import] = true;
            }

            return $name;
        };

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

        $signature = ' * @method ' . $returnType . ' ' . $admin->name . '(' . implode(', ', $params) . ')';
        if ($admin->queryParams !== []) {
            $signature .= ' Query: ' . implode(', ', $admin->queryParams);
        }
        $methods[] = $signature;
    }
}

if ($methods === []) {
    echo "No #[AdminApi] attributes found.\n";
    exit(0);
}

// Read the API class file
$apiRef = new ReflectionClass($apiFqcn);
$file = $apiRef->getFileName();
if ($file === false) {
    fwrite(STDERR, "Cannot locate $apiClass file.\n");
    exit(1);
}

$contents = file_get_contents($file);
if ($contents === false) {
    fwrite(STDERR, "Cannot read $file\n");
    exit(1);
}

// Rebuild the import block. Appending would leave imports for models a later
// generation deleted -- `use Namespace\Models\Gone;` referencing a class that
// no longer exists -- and would drift out of alphabetical order, which
// `ordered_imports` then reports. So the whole `Models\` set is recomputed from
// the attributes and the block is rewritten sorted.
$modelPrefix = manifestString('namespace').'\\Models\\';

if (!preg_match_all('/^use ([^\n]+);$/m', $contents, $useMatches, PREG_OFFSET_CAPTURE)) {
    fwrite(STDERR, "Cannot find the use block in $file\n");
    exit(1);
}

/** @var list<string> $keep */
$keep = [];
foreach ($useMatches[1] as $match) {
    if (!str_starts_with($match[0], $modelPrefix)) {
        $keep[] = $match[0];
    }
}

$all = array_values(array_unique([...$keep, ...array_keys($imports)]));

// Match php-cs-fixer's `ordered_imports` alpha algorithm exactly (it maps the
// namespace separator to a space, then compares case-insensitively), otherwise
// `composer lint` reports the block this script just wrote.
usort($all, static fn(string $a, string $b): int => strcasecmp(
    str_replace('\\', ' ', $a),
    str_replace('\\', ' ', $b),
));

$firstOffset = $useMatches[0][0][1];
$lastMatch   = $useMatches[0][count($useMatches[0]) - 1];
$endOffset   = $lastMatch[1] + strlen($lastMatch[0]);

$block = implode("\n", array_map(static fn(string $fqcn): string => "use $fqcn;", $all));

$contents = substr($contents, 0, $firstOffset).$block.substr($contents, $endOffset);

// Build the new @method block (just the lines, not the full docblock)
$methodBlock = implode("\n", $methods);

// Find the existing class docblock and inject/replace @method lines
$classPattern = 'class\s+'.preg_quote($apiClass, '#');

if (preg_match('#/\*\*[\s\S]*?\*/\s*'.$classPattern.'#', $contents, $match)) {
    $docblock = $match[0];

    // Remove existing @method lines. A return type can now contain spaces
    // (`ApiResult<array<int, WidgetTag>>`), so it is matched loosely.
    $cleaned = preg_replace('/^ \* @method .+\(.*\).*\n/m', '', $docblock);

    // Insert new @method lines before the closing */ of the docblock
    $cleaned = preg_replace(
        '#( \*/\s*'.$classPattern.')#',
        "$methodBlock\n\$1",
        $cleaned,
        1
    );

    $contents = str_replace($docblock, $cleaned, $contents);
} else {
    fwrite(STDERR, "Cannot find $apiClass class docblock.\n");
    exit(1);
}

file_put_contents($file, $contents);

$count = count($methods);
echo "Generated $count @method annotation(s) on $apiClass class.\n";
