# zero-to-prod/sdk

Template for a framework-agnostic PHP SDK, generated from an OpenAPI document.

Two things live here.

A package template. Client, transports, lifecycle hooks, route enum, models, factories, and the `composer` script tooling.

`php init` renames it into a new package. Git keeps the shared ancestry, so template fixes merge forward forever.

A generator. `composer generate-sdk` reads an OpenAPI 3.0/3.1 document and writes `src/Models/` and `src/ApiRoute.php`.

Models come from [`zero-to-prod/data-model-generator`](https://github.com/zero-to-prod/data-model-generator).

Pick your HTTP provider.

Curl, the default.

Laravel Http adapter.

Or build your own.

## Table of Contents

- [Using the template](#using-the-template)
  - [Creating a package](#creating-a-package)
  - [Pulling template updates](#pulling-template-updates)
- [Generating from OpenAPI](#generating-from-openapi)
  - [The manifest](#the-manifest)
  - [What gets generated](#what-gets-generated)
  - [Regenerating](#regenerating)
- [Install](#install)
- [Cli](#cli)
- [Quick Start](#quick-start)
  - [Testing with `Http::fake()`](#testing-with-httpfake)
- [Lifecycle Hooks](#lifecycle-hooks)
  - [Hooks](#hooks)
  - [HookContext](#hookcontext)
  - [Authentication](#authentication)
  - [Retries](#retries)
  - [Timeouts](#timeouts)
- [AI Agent Guide](#ai-agent-guide)
  - [Concepts](#concepts)
  - [Testing with Fake](#testing-with-fake)
  - [Factories](#factories)
    - [Publishing factories](#publishing-factories)
  - [Error Handling](#error-handling)
  - [Models](#models)
    - [Query parameters](#query-parameters)
    - [Publishing models](#publishing-models)
- [Interoperability & Extensibility](#interoperability--extensibility)
  - [Custom HttpTransport](#custom-httptransport)
  - [Caching responses](#caching-responses)
  - [Composing decorators](#composing-decorators)
  - [Framework interop](#framework-interop)

<!-- end toc -->
## Using the template

This repo is the common ancestor of every package derived from it.

A derived package is a clone with a remote named `template`. Not a fork, not a copy.

So `git pull template main` brings later template work downstream as an ordinary merge.

Every task in this repo is a composer script. `composer run -l` lists them.

### Creating a package

```bash
git clone https://github.com/zero-to-prod/sdk.git github-api
cd github-api
git remote rename origin template
gh repo create zero-to-prod/github-api --public --source=. --remote=origin
git config merge.keepours.driver true
php init
```

`php init` prompts for the package identity: slug, vendor, namespace, class names, base URL, docs URL, OpenAPI source.

It shows every value before it writes anything.

Then it rewrites tokens across all files, renames the files carrying the old identity (`src/SdkApi.php`, `bin/sdk`), and updates `composer.json` and `sdk.json`.

Then it deletes itself.

`composer new-package <slug>` prints that whole sequence with your slug filled in. Copy-paste it.

### Pulling template updates

```bash
git pull template main
composer check
git push
```

Never `git pull --rebase`.

Rebasing replays your commits onto the template's history and destroys the shared ancestry the scheme depends on.

A global `pull.rebase = true` turns the ordinary command into the destructive one.

Files your package owns are declared as `merge=keepours` lines in `.gitattributes`. Everything else takes the template's version.

`composer check-template` verifies the setup.

One footgun. The `keepours` driver lives in `.git/config`, not `.gitattributes`.

Every fresh clone must run `git config merge.keepours.driver true` once. Skip it and merges resolve the wrong way with no warning.

[`docs/template.md`](docs/template.md) holds the full runbook: grafting ancestry onto a repo that was copied rather than cloned, back-porting a fix upstream, and what must never be marked `keepours`.

## Generating from OpenAPI

### The manifest

`sdk.json` holds everything that differs between packages.

Tooling reads it. Nothing hardcodes an identity.

That is what keeps a derived package from editing a shared file, and from carrying a merge conflict that recurs forever.

```json
{
    "name": "zero-to-prod/sdk",
    "namespace": "Zerotoprod\\Sdk",
    "title": "SDK",
    "api_class": "SdkApi",
    "config_class": "SdkConfig",
    "bin": "sdk",
    "docs_url": "https://example.com/docs",
    "retain_models": ["Errors", "Pagination", "Query"],
    "openapi": {
        "source": null,
        "include_webhooks": false,
        "envelope_key": null
    }
}
```

`retain_models` is the one list generation reads back rather than writes.

Every other `.php` file under `src/Models/` is deleted before a run writes its output.

See [What gets generated](#what-gets-generated).

### What gets generated

```bash
composer generate-sdk                          # uses openapi.source from sdk.json
composer generate-sdk path/to/openapi.json     # or an explicit path or URL
composer generate-sdk -- --dry-run             # print the plan, write nothing
composer generate-sdk -- --models-only
composer generate-sdk -- --routes-only
composer generate-sdk -- --webhooks            # include x-webhooks operations
composer generate-sdk -- --all-schemas         # emit every schema, not only the reachable ones
```

Composer keeps flags for itself unless `--` separates them.

`composer generate-sdk --verbose` runs composer verbosely. `composer generate-sdk -- --verbose` reaches the generator.

A path argument needs no separator.

| Path                                           | Owner                                                      |
|------------------------------------------------|------------------------------------------------------------|
| `src/Models/**`                                | generated — rewritten, swept of old models                 |
| models named in `retain_models`                | hand-written, never swept                                  |
| `src/ApiRoute.php`                             | generated — replaced wholesale, do not hand-edit           |
| `factories/<Model>Factory.php`                 | deleted with the model                                     |
| `factories/ErrorsFactory`, `PaginationFactory` | hand-written, never swept                                  |
| `src/SdkApi.php`                               | `@method` docblock regenerated at the end                  |
| `tests/**`                                     | yours; the shared suite uses `tests/Fixtures/FixtureRoute` |
| everything else                                | yours or the template's                                    |

Generation owns `src/Models/`.

Before writing, it deletes every `src/Models/*.php` whose class name is not in `retain_models`, plus the matching factories.

That stops old models lingering as orphans no route references.

`--dry-run` shows the deletions without doing them.

`components/schemas` become model classes.

String and integer `enum` schemas become PHP enums with an `unknown` case. Unrecognized wire values never throw.

`allOf` members merge into one flat class.

Inline request and response bodies are promoted to named classes.

Each path becomes one `ApiRoute` case.

Each operation becomes one `#[AdminApi]` attribute with method name, path params, query params, request and response model.

A bare `type: array` response becomes `listOf: <ItemClass>` instead of losing its type.

Only schemas an API method can reach are emitted. Roots are the request and response bodies, plus everything they reference.

On the GitHub document that prunes 339 of 969 named schemas, reachable only from `x-webhooks`.

`--webhooks` adds webhook payloads to the roots. `--all-schemas` turns pruning off.

Operation names follow [`CLAUDE.md`](CLAUDE.md): `getWidget`, `listWidgets`, `createWidget`, `updateWidget`, `deleteWidget`.

The generator refuses to run when `git status` shows uncommitted changes under the paths it overwrites.

`--force` overrides that. Commit first so the diff is reviewable.

A run finishes by regenerating the `@method` block on the API class from the `#[AdminApi]` attributes it wrote in the same run.

That block is generated code. A stale one names swept models, and static analysis reads those as missing classes.

### Regenerating

`generate-sdk` is not part of `composer fix`. Regeneration is a decision, not a formatting pass.

After it runs, call:

```bash
composer fix      # rector, cs-fixer, @link + @method + README + TOC regeneration, phpstan, tests
```

`composer fix` strips the imports left behind by swept models and regenerates `@link` annotations on the new files.

## Install

```bash
composer require zero-to-prod/sdk
```

Publish docs for agent use.

```bash
./vendor/bin/sdk publish:skill
./vendor/bin/sdk publish:docs
```

<!-- generated by composer generate-readme — do not edit manually -->

## Cli

```bash
./vendor/bin/sdk
```

```
Usage: sdk <command>

Commands:
  readme                            Display the package README
  list:api                          Display the public API surface
  list:models [class]               List model classes, or describe a model's properties
  describe <class> [depth]          Describe a model's property tree (default depth: 2)
  generate:sdk [<openapi>] [flags]  Regenerate src/Models/ and src/ApiRoute.php from an OpenAPI document
  publish:skill                     Publish a Claude Code skill to .claude/commands/
  publish:models <ns> [models]      Publish model classes to your project
  publish:factories <ns> [factory]  Publish factory classes to your project
  publish:docs [path]               Publish package docs to [path] (default: <project>/docs) and wire composer sync scripts
```

<!-- end public api -->

## Quick Start

```php
use Zerotoprod\Sdk\SdkApi;
use Zerotoprod\Sdk\SdkConfig;

$api = new SdkApi([
    SdkConfig::url => 'https://api.example.com'
]);

$name = $api->getWidget('01HABCDEF...')->data->name;
```

### Testing with `Http::fake()`

`SdkApi` works with an empty config. Tests need no base URL.

`LaravelHttpTransport` returns `Illuminate\Http\Client\Response` directly. No `ApiResult` wrapping.

Laravel wildcards `Http::fake()` array keys, so a bare rendered `ApiRoute` matches any host.

```php
use Illuminate\Support\Facades\Http;
use Zerotoprod\Sdk\{SdkApi, LaravelHttpTransport, ApiRoute};
use Zerotoprod\Sdk\Factories\WidgetsResponseFactory;

Http::fake([
    ApiRoute::widgets()->render() => Http::response(WidgetsResponseFactory::factory()->context(), 200),
]);

$response = (new SdkApi([], new LaravelHttpTransport()))->listWidgets();

self::assertTrue($response->ok());
Http::assertSent(fn($r) => str_ends_with($r->url(), ApiRoute::widgets()->render()));
```

## Lifecycle Hooks

Register closures that run around every HTTP request. Use them for logging, tracing, header injection, metrics, or inspection.

Hooks are a third constructor argument, keyed by hook type. Each key takes one callable or a list.

```php
use Zerotoprod\Sdk\{SdkApi, HookContext, Hook};
use Illuminate\Support\Facades\Log;

$api = new SdkApi($config, new CurlHttpTransport(), [
    Hook::before->value => fn (HookContext $ctx) => Log::debug('Outgoing', $ctx->redacted()),
]);
```

Log `redacted()`, never `toArray()`.

`toArray()` is the mutation primitive. What it returns goes on the wire, so it cannot mask anything.

`redacted()` is the same array with credential headers replaced by `***`.

Log the raw array and you leak bearer tokens to your log aggregator.

Pass a list when you need several hooks of one type. They run in registration order.

```php
$api = new SdkApi($config, new CurlHttpTransport(), [
    Hook::before->value => [
        fn (HookContext $ctx) => $ctx->withHeaders(['X-Trace-Id' => bin2hex(random_bytes(8))]),
    ],
    Hook::after->value => [
        fn (HookContext $ctx) => logger()->info("{$ctx->HttpMethod->value} {$ctx->url} → {$ctx->response->status()}"),
    ],
    Hook::onException->value => [
        fn (HookContext $ctx, \Throwable $e) => logger()->error("Request to {$ctx->url} failed: {$e->getMessage()}"),
    ],
]);
```

### Hooks

| Hook          | Key                        | Signature                              | Mutate?                                           | Response           |
|---------------|----------------------------|----------------------------------------|---------------------------------------------------|--------------------|
| `before`      | `Hook::before->value`      | `fn(HookContext): HookContext\|void`   | Yes — return `HookContext` to replace the request | `null`             |
| `after`       | `Hook::after->value`       | `fn(HookContext): void`                | No                                                | transport response |
| `onException` | `Hook::onException->value` | `fn(HookContext, Throwable): void`     | No                                                | `null`             |

`before` hooks run in registration order.

Each may return a mutated `HookContext` to alter the request. The next hook sees that mutation.

Return anything else and the request stays unchanged.

`after` hooks run after a successful transport call, with the response attached. They observe only.

`onException` hooks run when the transport throws: connection error, timeout, and so on.

Each gets the context and the `Throwable`. The exception is re-thrown. `after` hooks do not run.

Hooks fire for every API method. A hook scopes itself by inspecting `$ctx->url` or `$ctx->HttpMethod`.

### HookContext

An immutable snapshot of one request moving through the lifecycle.

```php
$ctx->Hook;       // Hook enum (before / after / onException)
$ctx->HttpMethod; // HttpMethod enum — 'GET', 'POST', etc.
$ctx->url;        // fully qualified request URL
$ctx->options;    // Guzzle-compatible options array
$ctx->response;   // transport response during `after`; null otherwise
```

Properties are `readonly`. To mutate a request from a `before` hook, return a copy.

Use the helpers instead of rebuilding `options` by hand.

```php
$ctx->withHeaders(['X-Trace-Id' => $id]);   // merge headers, caller headers survive
$ctx->withOptions(['timeout' => 5]);        // merge options, others survive
$ctx->redacted();                           // array for logging, credentials masked
```

`HookContext::from([...$ctx->toArray(), ...])` still works.

But assigning `Options::headers` that way replaces every header, caller headers included. Use `withHeaders()`.

### Authentication

The client is provider-agnostic. Auth is a header you configure once.

```php
$api = new SdkApi([
    SdkConfig::url     => 'https://api.example.com',
    SdkConfig::headers => ['Authorization' => 'Bearer '.$token],
]);
```

`SdkConfig::headers` is sent with every request.

A per-call `Options::headers` of the same name wins. One request overrides the default without reconfiguring the client.

```php
$api->getWidget($id, [Options::headers => ['Authorization' => 'Bearer '.$otherToken]]);
```

For a token that rotates mid-process, inject it from a `before` hook. Every request picks up the current value.

```php
$api = new SdkApi($config, new CurlHttpTransport(), [
    Hook::before->value => fn (HookContext $ctx) => $ctx->withHeaders([
        'Authorization' => 'Bearer '.$tokens->current(),
    ]),
]);
```

`redacted()` masks header names that look like credentials: `Authorization`, `Cookie`, and anything containing `token`, `secret`, `password`, or `api-key`.

### Retries

`RetryingHttpTransport` decorates any transport and retries what is worth retrying.

```php
use Zerotoprod\Sdk\{RetryingHttpTransport, CurlHttpTransport};

$api = new SdkApi($config, new RetryingHttpTransport(new CurlHttpTransport()));

// Or tuned:
$api = new SdkApi($config, new RetryingHttpTransport(
    inner: new CurlHttpTransport(),
    maxAttempts: 5,      // total attempts; 1 disables
    baseDelay: 0.25,     // seconds the backoff doubles from
    maxDelay: 10.0,      // ceiling for a single sleep
));
```

It retries `429` and `5xx`, plus transport-level throws like connection refused or timeout.

A `4xx` that is not `429` returns immediately. A `422` will not become valid on retry.

Idempotent methods only, by default: `GET`, `HEAD`, `OPTIONS`, `PUT`, `DELETE`.

A `POST` is left alone. A timeout is not proof the server ignored it.

Pass `retryMethods: []` to retry every method, or list your own once you know an endpoint is safe.

Backoff is exponential with full jitter. Clients recovering from an outage do not resynchronize into a thundering herd.

A `Retry-After` header wins over the computed delay, in seconds or HTTP-date form, clamped to `maxDelay`.

### Timeouts

`CurlHttpTransport` sets a connect timeout separately from the total request timeout.

Without one, a black-holed IP or a stalled DNS answer burns the whole request budget before failing.

```php
$api->getWidget($id, [
    'timeout' => 5,          // total, seconds (default 30)
    'connect_timeout' => 2,  // TCP connect only (default 10)
]);
```

## AI Agent Guide

Run `./vendor/bin/sdk list:api` for the full public API surface.

### Concepts

`SdkApi` is the entry point.

`SdkConfig` is connection settings, an array keyed by class constants.

```php
$config = [
    SdkConfig::url             => 'https://api.example.com',
    SdkConfig::headers         => ['Authorization' => "Bearer $token"],
    SdkConfig::model_namespace => 'App\\Models\\Sdk',
    SdkConfig::route_enum      => ApiRoute::class,
];
```

`url` is required. `headers`, `model_namespace`, and `route_enum` are optional.

`route_enum` names the string-backed enum whose `#[AdminApi]` attributes the client dispatches. It defaults to the package's generated `ApiRoute`.

Point it at another enum to serve a mock API, a versioned surface, or a test fixture from the same client.

Resolution is cached per enum class, so several route enums coexist in one process.

`HttpTransport` is the pluggable HTTP layer.

```php
$api = new SdkApi($config);                             // Default (CurlHttpTransport)
$api = new SdkApi($config, new CurlHttpTransport());    // Explicit curl
$api = new SdkApi($config, new LaravelHttpTransport()); // Laravel Http facade
$api = new SdkApi($config, new RetryingHttpTransport(new CurlHttpTransport())); // Decorated
```

`Response` is the immutable return type from `CurlHttpTransport` and `Fake`.

```php
$response->ok();                        // true if 2xx
$response->failed();                    // true if not 2xx
$response->status();                    // int
$response->json();                      // full decoded array
$response->json('widgets');             // single key
$response->json('missing', 'fallback'); // with default
$response->header('Content-Type');      // case-insensitive
$response->body;                        // raw string
```

`ApiResult` wraps API responses. `$data` holds the model on success, `$errors` holds `Errors` on failure.

```php
$result = $api->getWidget('01H');
$result->ok();       // true if 2xx
$result->failed();   // true if not 2xx
$result->status();   // int
$result->data;       // hydrated model or null
$result->errors;     // hydrated Errors model or null
$result->response;   // raw Response
```

`ApiRoute` is a string-backed enum of endpoint paths. The raw path is on `->value`.

Call a case like a method to render it with query params.

```php
ApiRoute::widgets->value;                         // '/v1/widgets'
ApiRoute::widget->value;                          // '/v1/widgets/{id}'
ApiRoute::widgets(['per_page' => 50])->render();  // '/v1/widgets?per_page=50'
```

### Testing with Fake

`SdkApi::fake()` returns an in-memory transport. Queue responses FIFO.

An empty queue returns 200 with an empty body.

```php
[$api, $fake] = SdkApi::fake([
    SdkConfig::url => 'https://api.example.com',
]);

// Raw arrays
$fake->queue(
    new Response(200, [], json_encode(['id' => '01H', 'name' => 'Sprocket'])),
    new Response(404, [], json_encode(['message' => 'Widget not found'])),
);

// Or via factories
$fake->queue(
    new Response(200, [], WidgetFactory::factory()
        ->set(Widget::name, 'Sprocket')
        ->json()),
    new Response(404, [], ErrorsFactory::factory()
        ->set(Errors::message, 'Widget not found')
        ->json()),
);

$success = $api->getWidget('01H');
$failure = $api->getWidget('missing');

$fake->assertSent('GET', ApiRoute::widgets->value);
$fake->assertNotSent('DELETE');
$fake->assertSentCount(2);

$fake->recorded()[0]['method']; // 'GET'
$fake->recorded()[0]['url'];    // 'https://api.example.com/v1/widgets/01H'
```

### Factories

The package ships factories under `Zerotoprod\Sdk\Factories`. Tests build models without writing raw arrays.

They are backed by [`zero-to-prod/data-model-factory`](https://github.com/zero-to-prod/data-model-factory). Install it to use them.

```bash
composer require --dev zero-to-prod/data-model-factory
```

Build a model with default values.

```php
use Zerotoprod\Sdk\Factories\{
    WidgetFactory,
    WidgetsResponseFactory,
    SdkConfigFactory,
    UpdateWidgetRequestFactory,
};

$widget = WidgetFactory::factory()->make();
$widget->name; // 'Example widget'
```

Override on the factory call.

```php
$widget = WidgetFactory::factory([Widget::name => 'Override'])->make();
```

Use fluent `set()` with dot syntax for nested values.

```php
$widget = WidgetFactory::factory()
    ->set(Widget::name, 'Sprocket')
    ->set(Widget::status, WidgetStatus::archived->value)
    ->make();
```

Build a populated config for the API client.

```php
[$api, $fake] = SdkApi::fake(
    SdkConfigFactory::factory()->context(),
);
```

Queue a realistic paginated response body.

```php
$fake->queue(new Response(200, [], WidgetsResponseFactory::factory()->json()));

$result = $api->listWidgets();
$result->data->widgets[0]->name; // 'Example widget'
```

Build a request body model for the API.

```php
$api->updateWidget('01H', UpdateWidgetRequestFactory::factory()
    ->set(UpdateWidgetRequest::name, 'Renamed')
    ->make());
```

Use `->context()` when composing factories inside another factory's `definition()`. It returns the resolved array and skips the `make()` → hydrate → `toArray()` round trip.

#### Publishing factories

Publish factories into your own namespace to extend them. Add `setX()` helpers or override defaults.

Unpublished factories stay available from the vendor namespace.

```bash
./vendor/bin/sdk publish:factories 'App\Factories\Sdk' WidgetFactory WidgetsResponseFactory

./vendor/bin/sdk publish:factories 'App\Factories\Sdk'
```

Publish a subset and references to siblings you did not co-publish are imported from the vendor namespace.

Your published factory keeps working without forcing you to publish its dependencies.

### Error Handling

API methods return `ApiResult`. `$data` on success, `$errors` on failure.

```php
$result = $api->getWidget('missing-id');
if ($result->failed()) {
    $result->status();                         // 404
    $result->errors->message;                  // 'Widget not found'
    $result->errors->errors;                   // field-keyed map (422) or flat list
    $result->response->header('X-Request-Id');
} else {
    $result->data->name;                       // 'Sprocket'
}

$response = $api->getWidget('01H', [Options::raw => true]); // Skip ApiResult wrapping
```

Status codes.

400 is validation.

401 is unauthorized.

404 is not found.

422 is unprocessable entity. Check `errors` by field.

500 is a server error.

The `Errors` model carries `$errors->message`, a human-readable summary, and `$errors->errors`, keyed by field for 422 and a flat list otherwise.

### Models

API methods return `ApiResult` wrapping typed models. Request bodies take a model instance or a raw array.

```php
$result = $api->getWidget('01H');
$result->data->name; // 'Sprocket'

// Both forms work
$api->updateWidget('01H', ['name' => 'Renamed']);
$api->updateWidget('01H', UpdateWidgetRequest::from(['name' => 'Renamed']));
```

An endpoint whose body is a bare JSON array declares `listOf:` instead of `response:` on its `#[AdminApi]`.

`$result->data` is then a typed list, `array<int, WidgetTag>`. An empty body gives `[]`, never null.

```php
$result = $api->listWidgetTags('01H');

foreach ($result->data as $tag) {
    $tag->name; // 'featured'
}
```

#### Query parameters

Pass ad-hoc query parameters via `$options[Options::query]`. They are appended to the URL across all transports.

Filtering uses Laravel-style `where`. Eager loading uses Laravel-style `with`.

Use the `Query` model's constants for DSL keys so call sites stay in sync.

See [`src/Models/Query.php`](src/Models/Query.php) for the full shape reference.

```php
use Zerotoprod\Sdk\Models\Query;
use Zerotoprod\Sdk\Options;

// 2-tuple, operator defaults to =
$api->listWidgets([Options::query => [Query::where => ['status', 'active']]]);

// 3-tuple with explicit operator
$api->listWidgets([Options::query => [Query::where => ['name', 'LIKE', 'Sprocket%']]]);

// List of conditions
$api->listWidgets([Options::query => [Query::where => [['status', 'active'], ['name', 'Sprocket']]]]);

// Associative shorthand (= only)
$api->listWidgets([Options::query => [Query::where => ['status' => 'active']]]);

// with: string, dot for nested, or array
$api->listWidgets([Options::query => [Query::per_page => 50, Query::with => ['owner', 'parts']]]);
$api->listWidgets([Options::query => [Query::where => ['status', 'active'], Query::with => 'owner.team']]);
$api->listWidgets([Options::query => [Query::with => ['owner' => ['team']]]]);

$api->getWidget('01H', [Options::query => [Query::fields => ['widgets' => ['id', 'name']]], 'timeout' => 5]);
```

#### Publishing models

Publish only the models you need to customize. Unpublished models fall back to package defaults.

```bash
./vendor/bin/sdk publish:models 'App\Models\Sdk' WidgetsResponse Widget

./vendor/bin/sdk publish:models 'App\Models\Sdk'
```

Set the namespace in your config.

```php
SdkConfig::model_namespace => 'App\\Models\\Sdk',
```

Add a custom method to a published model. The package uses your version for API responses.

```php
namespace App\Models\Sdk;

use Zerotoprod\Sdk\Internal\DataModel;

class Widget
{
    use DataModel;

    public function label(): string
    {
        return $this->name ?? ($this->id ?? 'Unknown');
    }
}
```

```php
$result = $api->getWidget($id);
$result->data->label(); // 'Sprocket'
$result->data->name;    // 'Sprocket'

$result = $api->listWidgets();
$result->data->Pagination->total; // Pagination uses vendor model
```

Publishing is how a hand-written method survives a `composer generate-sdk` run. Regeneration overwrites `src/Models/`.

## Interoperability & Extensibility

Every layer is pluggable.

Publish only what you want to customize. Unpublished classes fall back to the vendor namespace, per class.

Partial publishes are a supported workflow.

| Plug point        | How                                                                 | Default                                       |
|-------------------|---------------------------------------------------------------------|-----------------------------------------------|
| HTTP client       | Pass an `HttpTransport` to the constructor                          | `CurlHttpTransport`                           |
| Response caching  | Wrap the transport in `CachingHttpTransport`                        | None                                          |
| Model namespace   | `SdkConfig::model_namespace` + `publish:models`                     | `Zerotoprod\Sdk\Models`                       |
| Route set         | `SdkConfig::route_enum` — any string-backed enum with `#[AdminApi]` | `ApiRoute`                                    |
| Factory namespace | `publish:factories <namespace> [factory...]`                        | `Zerotoprod\Sdk\Factories`                    |
| Response shape    | `[Options::raw => true]`                                            | `ApiResult` with hydrated `$data` / `$errors` |
| List responses    | `listOf: Model::class` on the route's `#[AdminApi]`                 | `response:` — one object                      |
| Request body      | Typed request model or raw array                                    | —                                             |
| Headers, timeout  | `$options[Options::headers]`, `$options['timeout']`                 | —                                             |
| Query params      | `$options[Options::query]`                                          | —                                             |
| Curl options      | `$options['curl']` (native `CURLOPT_*`)                             | `CurlHttpTransport` only                      |

Resolution is per class. The dispatcher tries `{model_namespace}\{Model}` first and falls back to the vendor namespace when the class does not exist.

So you can extend `Widget` without publishing `Pagination`.

The same fallback applies to the `Errors` model on failure paths, and to the element class of a `listOf:` list response.

### Custom HttpTransport

Implement `Zerotoprod\Sdk\HttpTransport`. The `@template TResponse` sets the return type when `[Options::raw => true]` is passed.

A Guzzle transport makes `raw` calls return `Psr\Http\Message\ResponseInterface`.

```php
use Zerotoprod\Sdk\HttpTransport;

/** @implements HttpTransport<\Psr\Http\Message\ResponseInterface> */
class GuzzleTransport implements HttpTransport
{
    public function __construct(private \GuzzleHttp\ClientInterface $client) {}

    public function request(string $method, string $url, array $options = []): \Psr\Http\Message\ResponseInterface
    {
        return $this->client->request($method, $url, $options);
    }
}

$api = new SdkApi($config, new GuzzleTransport($client));
```

Options follow Guzzle conventions: `json`, `form_params`, `headers`, `query`, `timeout`.

For keys the package manages, use the `Options` constants. Call sites stay in sync even when the underlying strings change.

`ApiResult` hydration only runs when the transport returns the package's own `Response`.

A custom transport that returns a different type needs `Options::raw => true` at the call site, or it must return a `Response`.

### Caching responses

`CachingHttpTransport` decorates any `HttpTransport` and routes idempotent `GET` requests through a closure you supply. The closure owns the cache backend and the TTL.

Every non-`GET` request passes straight through. Mutations are never cached.

```php
use Zerotoprod\Sdk\{SdkApi, CachingHttpTransport, CurlHttpTransport};
use Illuminate\Support\Facades\Cache;

$api = new SdkApi($config, new CachingHttpTransport(
    new CurlHttpTransport(),
    fn (string $key, \Closure $fetch) => Cache::remember($key, 60, $fetch),
));

$api->getWidget('01H'); // hits the network
$api->getWidget('01H'); // served from cache
```

The closure is the whole contract. A dependency-free in-memory cache is an array.

Capture it by reference so writes persist across calls. An arrow `fn` captures by value and will not work.

```php
$store = [];

$api = new SdkApi($config, new CachingHttpTransport(
    new CurlHttpTransport(),
    function (string $key, \Closure $fetch) use (&$store): array {
        return $store[$key] ??= $fetch();
    },
));
```

Stored data is a serializable `['status', 'headers', 'body']` array, never the response object. It survives any cache driver, including behind `LaravelHttpTransport`.

On a hit and a miss alike, that array is rehydrated into the transport's native response. The return type matches an un-cached call.

The defaults target the package's own `Response`, returned by `CurlHttpTransport` and `Fake`.

To cache a transport that returns a different type, pass matching `$normalize` and `$rehydrate` closures. Pass `$keyFor` to control the cache key.

```php
new CachingHttpTransport(
    inner:     new LaravelHttpTransport(),
    cache:     fn (string $key, \Closure $fetch) => Cache::remember($key, 60, $fetch),
    normalize: fn (\Illuminate\Http\Client\Response $r): array => [
        'status' => $r->status(), 'headers' => $r->headers(), 'body' => $r->body(),
    ],
    rehydrate: fn (array $d) => new \Illuminate\Http\Client\Response(
        new \GuzzleHttp\Psr7\Response($d['status'], $d['headers'], $d['body']),
    ),
);
```

The default cache key hashes the method, URL, and options.

`options` includes request headers, so an `Authorization` or tenant header isolates cache entries on its own.

Pass `$keyFor` to widen or narrow that scope.

Wrap `Fake` explicitly in tests to exercise caching. `SdkApi::fake()` hardwires the `Fake` transport.

```php
new SdkApi($config, new CachingHttpTransport(new Fake(), $cache))
```

### Composing decorators

`CachingHttpTransport` and `RetryingHttpTransport` both wrap an `HttpTransport` and return one. They nest, and the order decides the behavior.

```php
// Cache outermost: a cache hit costs nothing, only a miss can retry.
new CachingHttpTransport(new RetryingHttpTransport(new CurlHttpTransport()), $cache)
```

That is usually the order you want. The reverse re-enters the cache lookup on every attempt. No harm, no gain.

### Framework interop

Laravel. `LaravelHttpTransport` returns `Illuminate\Http\Client\Response` directly. `Http::fake()` and `Http::assertSent()` work natively.

Any PSR-18, Guzzle, or Symfony HTTP client. Wrap it in an `HttpTransport` as shown above.

Claude Code and AI agents. `publish:skill` drops a skill into `.claude/commands/`. `publish:docs` syncs package docs into your project and wires composer `post-install-cmd` / `post-update-cmd` hooks so they stay current on `composer update`.