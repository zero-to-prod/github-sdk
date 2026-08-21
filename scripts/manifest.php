<?php

declare(strict_types=1);

/**
 * Shared accessor for the template manifest (`sdk.json`).
 *
 * Package identity — composer name, namespace, API/config class, CLI name,
 * docs URL — lives in the manifest, never hardcoded in the tooling. A derived
 * package rewrites `sdk.json` and inherits every script unchanged.
 *
 * @return array<string, mixed>
 */
function manifest(): array
{
    /** @var array<string, mixed>|null $cached */
    static $cached = null;

    if ($cached !== null) {
        return $cached;
    }

    $file = dirname(__DIR__).'/sdk.json';

    if (!is_file($file)) {
        manifestFail("Manifest not found: $file\nEvery script reads package identity from sdk.json — restore it.");
    }

    $raw = file_get_contents($file);
    if ($raw === false) {
        manifestFail("Cannot read $file");
    }

    $data = json_decode($raw, true);
    if (!is_array($data)) {
        manifestFail("Malformed JSON in $file: ".json_last_error_msg());
    }

    foreach (['name', 'namespace', 'title', 'api_class', 'config_class', 'bin', 'docs_url'] as $key) {
        if (!isset($data[$key]) || !is_string($data[$key]) || trim($data[$key]) === '') {
            manifestFail("Malformed manifest $file: missing or empty string key \"$key\".");
        }
    }

    /** @var array<string, mixed> $data */
    $cached = $data;

    return $cached;
}

/**
 * A single string value from the manifest.
 */
function manifestString(string $key): string
{
    $value = manifest()[$key] ?? null;

    if (!is_string($value) || trim($value) === '') {
        manifestFail("Malformed manifest sdk.json: missing or empty string key \"$key\".");
    }

    /** @var string $value */
    return $value;
}

/**
 * Fully-qualified class name inside the package namespace.
 * `manifestClass('ApiRoute')` → `Zerotoprod\Sdk\ApiRoute` for the template.
 */
function manifestClass(string $relative): string
{
    return manifestString('namespace').'\\'.$relative;
}

/**
 * A list-of-strings value from the manifest, with a fallback for a derived
 * package whose `sdk.json` predates the key.
 *
 * `retain_models` is the one that matters: generation sweeps `src/Models/` and
 * anything not listed goes, so an absent key must not read as "retain nothing".
 *
 * @param  list<string>  $default
 * @return list<string>
 */
function manifestList(string $key, array $default = []): array
{
    $value = manifest()[$key] ?? null;

    if (!is_array($value)) {
        return $default;
    }

    return array_values(array_filter($value, 'is_string'));
}

/**
 * Would importing a model of this short name into the package's root namespace
 * shadow a class that is already there?
 *
 * The `@method` annotations on the API class name their models by short name,
 * which reads well and needs one `use` each. But an OpenAPI document is free to
 * declare a schema called `Hook`, `Response` or `Options`, and importing
 * `<ns>\Models\Hook` into the file that already resolves `Hook` to the
 * package's own hook enum does not produce a wrong docblock — it produces a
 * fatal error the first time that file mentions `Hook` in code.
 *
 * Callers write such a model out as a fully-qualified name instead, and skip the
 * import. Both the generator and the checker use this so they agree.
 */
function manifestShadowsPackageClass(string $shortName): bool
{
    return is_file(dirname(__DIR__).'/src/'.$shortName.'.php');
}

/**
 * How a model reference is written inside an `@method` annotation, and the FQCN
 * to import for it (null when it must not be imported).
 *
 * @return array{string, string|null}
 */
function manifestMethodType(string $shortName, string $fqcn): array
{
    return manifestShadowsPackageClass($shortName)
        ? ['\\'.ltrim($fqcn, '\\'), null]
        : [$shortName, $fqcn];
}

/**
 * A path parameter as a PHP variable name for an `@method` annotation.
 *
 * OpenAPI path parameters are free-form (`enterprise-team`, `2fa`), and pasting
 * one straight into a docblock yields `$enterprise-team`, which is not a
 * variable and makes the whole `@method` tag unparseable. `SdkApi::__call()`
 * maps path params positionally, so the name here is documentation only and is
 * safe to normalise.
 */
function manifestParamName(string $pathParam): string
{
    $name = (string) preg_replace('/[^A-Za-z0-9_]+/', '_', $pathParam);

    return preg_match('/^\d/', $name) === 1 ? '_'.$name : $name;
}

function manifestFail(string $message): never
{
    fwrite(STDERR, rtrim($message, "\n")."\n");
    exit(1);
}
