# zero-to-prod/github-sdk

Template for a framework-agnostic PHP SDK, generated from an OpenAPI document.

Two things live here:

- **A package template.** A working, tested SDK skeleton — client, transports, lifecycle hooks,
  route enum, data models, factories, and the `./run` tooling. `php init` renames it into a new
  package; git keeps the shared ancestry so template improvements merge forward forever.
- **A generator.** `./run generate-sdk` reads an OpenAPI 3.0/3.1 document and writes `src/Models/`
  and `src/ApiRoute.php`. Models are emitted through
  [`zero-to-prod/data-model-generator`](https://github.com/zero-to-prod/data-model-generator).

Framework-agnostic with pluggable HTTP providers

- Curl (default)
- Laravel Http adapter
- Build your own

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

This repository is the common ancestor of every package derived from it. A derived package is a
clone with a remote named `template`, not a fork and not a copy — so `git pull template main`
brings later template work downstream as an ordinary merge.

### Creating a package

```bash
git clone https://github.com/zero-to-prod/github-sdk.git github-api
cd github-api
git remote rename origin template
gh repo create zero-to-prod/github-api --public --source=. --remote=origin
git config merge.keepours.driver true
php init
```

`php init` prompts for the package identity — slug, vendor, namespace, class names, base URL, docs
URL, OpenAPI source — shows you every value it is about to write, and only then rewrites the tree:
tokens across all files, the file names that carry the old identity (`src/GitHubSdk.php`,
`bin/github-sdk`, …), `composer.json`, and `sdk.json`. It deletes itself afterwards.

`./run new-package <slug>` prints that whole sequence with your slug substituted in, so you can
copy-paste it.

### Pulling template updates

```bash
git pull template main
./run check-all
git push
```

Never `git pull --rebase`. Rebasing replays your commits onto the template's history and destroys
the shared ancestry the whole scheme depends on — and a global `pull.rebase = true` turns the
ordinary command into the destructive one.

Files your package owns outright are declared once, as `merge=keepours` lines at the bottom of your
`.gitattributes`. Everything else takes the template's version. `./run check-template` verifies the
setup, including the one footgun: the `keepours` driver lives in `.git/config`, not in
`.gitattributes`, so **every fresh clone must run `git config merge.keepours.driver true` once** or
merges silently resolve the wrong way with no warning.

The full runbook — grafting ancestry onto a repository that was copied rather than cloned,
back-porting a fix upstream, and what must never be marked `keepours` — is in
[`docs/template.md`](docs/template.md).

## Generating from OpenAPI

### The manifest

`sdk.json` holds everything that differs between packages. Tooling reads it; nothing hardcodes an
identity. That is what keeps a derived package from having to edit a shared file — and therefore
from carrying a merge conflict that recurs forever.

```json
{
    "name": "zero-to-prod/github-sdk",
    "namespace": "Zerotoprod\\GitHubSdk",
    "title": "SDK",
    "api_class": "GitHubSdk",
    "config_class": "GitHubSdkConfig",
    "bin": "sdk",
    "docs_url": "https://docs.github.com/",
    "retain_models": ["Errors", "Pagination", "Query"],
    "openapi": {
        "source": null,
        "include_webhooks": false,
        "envelope_key": null
    }
}
```

`retain_models` is the one list generation reads back rather than writes: every other `.php` file
under `src/Models/` is deleted before a run writes its output. See
[What gets generated](#what-gets-generated).

### What gets generated

```bash
./run generate-sdk                       # uses openapi.source from sdk.json
./run generate-sdk path/to/openapi.json  # or an explicit path or URL
./run generate-sdk --dry-run             # print the plan, write nothing
./run generate-sdk --models-only
./run generate-sdk --routes-only
./run generate-sdk --webhooks            # include x-webhooks operations
./run generate-sdk --all-schemas         # emit every schema, not only the reachable ones
```

| Path                                       | Owner                                                        |
|--------------------------------------------|--------------------------------------------------------------|
| `src/Models/**`                            | **generated** — rewritten, and swept of anything it no longer declares |
| the models named in `retain_models`         | yours — hand-written, never swept                            |
| `src/ApiRoute.php`                         | **generated** — replaced wholesale, do not hand-edit         |
| `factories/<Model>Factory.php`             | deleted with the model it belongs to                         |
| `factories/ErrorsFactory`, `PaginationFactory`, `<Config>Factory` | yours — never swept                    |
| `src/GitHubSdk.php`                           | `@method` docblock regenerated at the end of every run       |
| `tests/**`                                 | yours; the shared suite runs against `tests/Fixtures/FixtureRoute` |
| everything else                            | yours (or the template's)                                    |

Generation **owns** `src/Models/`. The data-model generator only ever adds files, so before writing
anything a run deletes every `src/Models/*.php` whose class name is not in `retain_models`, together
with the matching `factories/<Model>Factory.php`. Without that, models from a previous document — or
the template's shipped `Widget` example domain — would linger as orphans that no route references.
`--dry-run` reports the intended deletions and performs none of them; the run summary counts them on
a `deleted` line.

`components/schemas` become model classes; string and integer `enum` schemas become PHP enums with
an `unknown` case so an unrecognised value from the wire never throws; `allOf` members are merged
into one flat class; inline request and response bodies are promoted to named classes. Each path
becomes one `ApiRoute` case, and each operation on it one `#[AdminApi]` attribute carrying the
method name, path params, query params, and request/response model. A response whose schema is a
bare `type: array` becomes `listOf: <ItemClass>` rather than losing its typing.

Only the schemas an API method can actually reach are emitted — the roots are the request and
response bodies, and everything they reference transitively. A real document declares far more than
that (GitHub: 339 of 969 named schemas are reachable only from `x-webhooks`), so the rest is pruned
and counted in the run summary. `--webhooks` adds the webhook payloads to the roots; `--all-schemas`
turns pruning off entirely.

Operation names follow the convention in [`CLAUDE.md`](CLAUDE.md): `getWidget`, `listWidgets`,
`createWidget`, `updateWidget`, `deleteWidget`.

The generator refuses to run when `git status` shows uncommitted changes under the paths it
overwrites, unless you pass `--force`. Commit first; then the diff of a regeneration is reviewable.

A run finishes by regenerating the `@method` block on the API class from the `#[AdminApi]`
attributes it just wrote. That block is derived from `src/ApiRoute.php`, so it belongs to the
generated surface: left stale it would go on naming models the run has swept, which static analysis
reads — correctly — as missing classes.

### Regenerating

`generate-sdk` is deliberately **not** part of `./run fix-all` — regeneration is a decision, not a
formatting pass. After it runs:

```bash
./run fix-all      # rector, cs-fixer, @link + @method + README + TOC regeneration, phpstan, tests
```

`fix-all` is still worth running: it strips the imports left behind by models that were swept, and
regenerates the `@link` annotations on the new files.

## Install

```bash
composer require zero-to-prod/github-sdk
```

Publish docs for agent use:

```bash
./vendor/bin/github-sdk publish:skill
./vendor/bin/github-sdk publish:docs
```

<!-- generated by ./run generate-readme — do not edit manually -->

## Cli

```bash
./vendor/bin/github-sdk
```

```
Usage: github-sdk <command>

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
use Zerotoprod\GitHubSdk\GitHubSdk;
use Zerotoprod\GitHubSdk\GitHubSdkConfig;

$api = new GitHubSdk([
    GitHubSdkConfig::url => 'https://api.example.com'
]);

$name = $api->getWidget('01HABCDEF...')->data->name;
```

### Testing with `Http::fake()`

`GitHubSdk` works with an empty config — tests don't need to configure a base URL. `LaravelHttpTransport` returns `Illuminate\Http\Client\Response` directly (no `ApiResult` wrapping), and Laravel auto-wildcards `Http::fake()` array keys so a bare rendered `ApiRoute` matches any host:

```php
use Illuminate\Support\Facades\Http;
use Zerotoprod\GitHubSdk\{GitHubSdk, LaravelHttpTransport, ApiRoute};
use Zerotoprod\GitHubSdk\Factories\WidgetsResponseFactory;

Http::fake([
    ApiRoute::widgets()->render() => Http::response(WidgetsResponseFactory::factory()->context(), 200),
]);

$response = (new GitHubSdk([], new LaravelHttpTransport()))->listWidgets();

self::assertTrue($response->ok());
Http::assertSent(fn($r) => str_ends_with($r->url(), ApiRoute::widgets()->render()));
```

## Lifecycle Hooks

Register closures that run around **every** HTTP request the client makes — for logging, tracing, global header injection, metrics, or inspection. Hooks are passed as a third constructor argument, keyed by hook. Each hook accepts **either a single callable or a list of callables**:

```php
use Zerotoprod\GitHubSdk\{GitHubSdk, HookContext, Hook};
use Illuminate\Support\Facades\Log;

// A single closure per hook — no array wrapper needed.
$api = new GitHubSdk($config, new CurlHttpTransport(), [
    Hook::before->value => fn (HookContext $ctx) => Log::debug('Outgoing', $ctx->redacted()),
]);
```

> Log `redacted()`, never `toArray()`. `toArray()` is the mutation primitive — whatever it returns
> is what goes on the wire — so it cannot mask anything. `redacted()` is the same array with
> credential header values replaced by `***`. Since a `before` hook is also where auth headers get
> injected, logging the raw array is how a bearer token ends up in your log aggregator.


Pass a list when you need more than one hook for a hook (they run in registration order):

```php
$api = new GitHubSdk($config, new CurlHttpTransport(), [
    Hook::before->value => [
        // Add a header to the outgoing request. `withHeaders()` merges, so the
        // headers a caller passed for this one call survive.
        fn (HookContext $ctx) => $ctx->withHeaders(['X-Trace-Id' => bin2hex(random_bytes(8))]),
    ],
    Hook::after->value => [
        // Observe the response (read-only).
        fn (HookContext $ctx) => logger()->info("{$ctx->HttpMethod->value} {$ctx->url} → {$ctx->response->status()}"),
    ],
    Hook::onException->value => [
        // Observe a transport failure before it is re-thrown.
        fn (HookContext $ctx, \Throwable $e) => logger()->error("Request to {$ctx->url} failed: {$e->getMessage()}"),
    ],
]);
```

### Hooks

| Hook             | Key | Signature | Can mutate? | `$response` |
|---------------|-----|-----------|-------------|-------------|
| `before`      | `Hook::before->value` (`'before'`) | `fn(HookContext): HookContext\|void` | Yes — return a `HookContext` to replace the request | `null` |
| `after`       | `Hook::after->value` (`'after'`) | `fn(HookContext): void` | No (observe only) | the transport response |
| `onException` | `Hook::onException->value` (`'onException'`) | `fn(HookContext, Throwable): void` | No (observe only) | `null` |

- Each hook accepts a single callable or a list; the two forms may be mixed across hooks.
- **`before`** hooks run in registration order; each may return a (mutated) `HookContext` to alter the outgoing request — and the next hook sees that mutation. Returning anything other than a `HookContext` leaves the request unchanged.
- **`after`** hooks run after a successful transport call, with the response attached to the context. They observe only.
- **`onException`** hooks run when the transport throws (e.g. a connection error). Each receives the context and the `Throwable`; the exception is then re-thrown — `after` hooks do **not** run.

Hooks fire for every API method. A hook can scope itself by inspecting `$ctx->url` or `$ctx->HttpMethod`.

### HookContext

An immutable snapshot of one request as it moves through the lifecycle:

```php
$ctx->Hook;       // Hook enum (before / after / onException)
$ctx->HttpMethod;  // HttpMethod enum — $ctx->HttpMethod->value is 'GET', 'POST', ...
$ctx->url;         // fully qualified request URL
$ctx->options;     // Guzzle-compatible options array (json, headers, query, ...)
$ctx->response;    // transport response during `after`; null otherwise
```

Properties are `readonly`, so mutating a request from a `before` hook means returning a copy. Use the
helpers rather than rebuilding `options` by hand:

```php
$ctx->withHeaders(['X-Trace-Id' => $id]);  // merge headers — per-call headers survive
$ctx->withOptions(['timeout' => 5]);       // merge options — other options survive
$ctx->redacted();                          // array for logging, credential headers masked
```

The escape hatch is still there — `HookContext::from([...$ctx->toArray(), ...])` — but note that
assigning `Options::headers` that way **replaces** every header already on the request, including
the ones a caller passed for that call. That is why `withHeaders()` exists.

### Authentication

The client is provider-agnostic and has no notion of a token or scheme — auth is a header you
configure once:

```php
$api = new GitHubSdk([
    GitHubSdkConfig::url     => 'https://api.example.com',
    GitHubSdkConfig::headers => ['Authorization' => 'Bearer '.$token],
]);
```

`GitHubSdkConfig::headers` is sent with every request. A per-call `Options::headers` of the same name wins,
so one request can override the default without reconfiguring the client:

```php
$api->getWidget($id, [Options::headers => ['Authorization' => 'Bearer '.$otherToken]]);
```

For a credential that rotates mid-process — a short-lived token refreshed on demand — inject it from
a `before` hook instead, so every request picks up the current value:

```php
$api = new GitHubSdk($config, new CurlHttpTransport(), [
    Hook::before->value => fn (HookContext $ctx) => $ctx->withHeaders([
        'Authorization' => 'Bearer '.$tokens->current(),
    ]),
]);
```

Header names that look like credentials — `Authorization`, `Cookie`, and anything containing `token`,
`secret`, `password` or `api-key` — are masked by `redacted()`.

### Retries

`RetryingHttpTransport` decorates any transport and retries what is worth retrying:

```php
use Zerotoprod\GitHubSdk\{RetryingHttpTransport, CurlHttpTransport};

$api = new GitHubSdk($config, new RetryingHttpTransport(new CurlHttpTransport()));

// Or tuned:
$api = new GitHubSdk($config, new RetryingHttpTransport(
    inner: new CurlHttpTransport(),
    maxAttempts: 5,      // total attempts including the first; 1 disables retrying
    baseDelay: 0.25,     // seconds the backoff doubles from
    maxDelay: 10.0,      // ceiling for a single sleep
));
```

- Retries `429` and `5xx`, plus any transport-level throw (connection refused, timeout). A `4xx`
  that is not `429` returns immediately — a `422` will not become valid on a second ask.
- Only idempotent methods by default (`GET`, `HEAD`, `OPTIONS`, `PUT`, `DELETE`). A `POST` is left
  alone because a timeout is not proof the server ignored it. Pass `retryMethods: []` to retry every
  method, or list your own once you know an endpoint is safe.
- Exponential backoff with **full jitter**, so clients recovering from one outage do not
  resynchronise into a thundering herd.
- A `Retry-After` header wins over the computed delay, in either its seconds or HTTP-date form,
  clamped to `maxDelay`.

### Timeouts

`CurlHttpTransport` sets a connect timeout separately from the total request timeout — without one, a
black-holed IP or a stalled DNS answer burns the whole request budget before failing:

```php
$api->getWidget($id, [
    'timeout' => 5,          // total, seconds (default 30)
    'connect_timeout' => 2,  // TCP connect only (default 10)
]);
```

## AI Agent Guide

Run `./vendor/bin/github-sdk list:api` for the full public API surface.

### Concepts

**GitHubSdk** — entry point. **GitHubSdkConfig** — connection settings as array with class constant keys:

```php
$config = [
    GitHubSdkConfig::url             => 'https://api.example.com', // required
    GitHubSdkConfig::headers         => ['Authorization' => "Bearer $token"], // optional — sent with every request
    GitHubSdkConfig::model_namespace => 'App\\Models\\Sdk',        // optional — defaults to package namespace
    GitHubSdkConfig::route_enum      => ApiRoute::class,           // optional — defaults to ApiRoute
];
```

`route_enum` names the string-backed enum whose `#[AdminApi]` attributes this client dispatches.
It defaults to the package's own generated `ApiRoute`; point it at another enum to serve a second
route set — a mock API, a versioned surface, or a test fixture — from the same client. Resolution is
cached per enum class, so several route enums coexist in one process.

**HttpTransport** — pluggable HTTP layer:

```php
$api = new GitHubSdk($config);                             // Default (CurlHttpTransport)
$api = new GitHubSdk($config, new CurlHttpTransport());    // Explicit curl
$api = new GitHubSdk($config, new LaravelHttpTransport()); // Laravel Http facade

// Decorators wrap any transport, and compose:
$api = new GitHubSdk($config, new RetryingHttpTransport(new CurlHttpTransport()));
```

**Response** — immutable return type from `CurlHttpTransport` and `Fake`:

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

**ApiResult** — wraps API responses. `$data` holds model on success, `$errors` holds `Errors` on failure:

```php
$result = $api->getWidget('01H');
$result->ok();       // true if 2xx
$result->failed();   // true if not 2xx
$result->status();   // int
$result->data;       // hydrated model (e.g. Widget) or null
$result->errors;     // hydrated Errors model or null
$result->response;   // raw Response
```

**ApiRoute** — string-backed enum of endpoint paths. The raw path is available via `->value`; call a case like a method to render with query params:

```php
ApiRoute::widgets->value;                         // '/v1/widgets'
ApiRoute::widget->value;                          // '/v1/widgets/{id}' (placeholder)
ApiRoute::widgets(['per_page' => 50])->render();  // '/v1/widgets?per_page=50'
```

### Testing with Fake

`GitHubSdk::fake()` returns an in-memory transport. Queue responses (FIFO — empty queue returns 200 with empty body), call methods, then assert:

```php
[$api, $fake] = GitHubSdk::fake([
    GitHubSdkConfig::url => 'https://api.example.com',
]);

// Raw arrays — quickest for small fixtures
$fake->queue(
    new Response(200, [], json_encode(['id' => '01H', 'name' => 'Sprocket'])),
    new Response(404, [], json_encode(['message' => 'Widget not found'])),
);

// Or via factories — typed, with sensible defaults (see "Factories" below)
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

$fake->assertSent('GET', ApiRoute::widgets->value); // method + URL substring match
$fake->assertNotSent('DELETE');
$fake->assertSentCount(2);

$fake->recorded()[0]['method']; // 'GET'
$fake->recorded()[0]['url'];    // 'https://api.example.com/v1/widgets/01H'
```

### Factories

The package ships factories under `Zerotoprod\GitHubSdk\Factories` so tests can build models without
writing raw arrays. They are backed by
[`zero-to-prod/data-model-factory`](https://github.com/zero-to-prod/data-model-factory), which the
package only suggests — install it in your project to use them:

```bash
composer require --dev zero-to-prod/data-model-factory
```


```php
use Zerotoprod\GitHubSdk\Factories\{
    WidgetFactory,
    WidgetsResponseFactory,
    GitHubSdkConfigFactory,
    UpdateWidgetRequestFactory,
};

// Build a model with default values
$widget = WidgetFactory::factory()->make();
$widget->name; // 'Example widget'

// Override on the factory() call
$widget = WidgetFactory::factory([Widget::name => 'Override'])->make();

// Fluent set() — dot syntax for nested values
$widget = WidgetFactory::factory()
    ->set(Widget::name, 'Sprocket')
    ->set(Widget::status, WidgetStatus::archived->value)
    ->make();

// Build a populated config for the API client
[$api, $fake] = GitHubSdk::fake(
    GitHubSdkConfigFactory::factory()->context(), // ->context() returns the resolved array
);

// Queue a realistic paginated response body without writing JSON by hand
$fake->queue(new Response(200, [], WidgetsResponseFactory::factory()->json()));

$result = $api->listWidgets();
$result->data->widgets[0]->name; // 'Example widget'

// Build a request body model to pass to the API
$api->updateWidget('01H', UpdateWidgetRequestFactory::factory()
    ->set(UpdateWidgetRequest::name, 'Renamed')
    ->make());
```

> Use `->context()` (resolved array) when composing factories inside another factory's `definition()` — it skips the `make()` → hydrate → `toArray()` round trip.

#### Publishing factories

Publish factories into your project's namespace so you can extend them (add `setX()` helpers, override defaults, etc.). Unpublished factories remain available from the vendor namespace:

```bash
# Publish specific factories
./vendor/bin/github-sdk publish:factories 'App\Factories\Sdk' WidgetFactory WidgetsResponseFactory

# Or publish all factories at once
./vendor/bin/github-sdk publish:factories 'App\Factories\Sdk'
```

When publishing a subset, references to sibling factories that weren't co-published are automatically imported from the vendor namespace — so your published factory keeps working without forcing you to publish its dependencies.

### Error Handling

API methods return `ApiResult` — `$data` on success, `$errors` on failure:

```php
$result = $api->getWidget('missing-id');
if ($result->failed()) {
    $result->status();                         // 404
    $result->errors->message;                  // 'Widget not found'
    $result->errors->errors;                   // field-keyed map (422) or flat list
    $result->response->header('X-Request-Id'); // raw response always available
} else {
    $result->data->name;                       // 'Sprocket'
}

// Skip ApiResult wrapping with Options::raw => true
$response = $api->getWidget('01H', [Options::raw => true]);
```

**Status codes:** 400 = validation · 401 = unauthorized · 404 = not found · 422 = unprocessable entity (check `errors` by field) · 500 = server error

**Errors model** — `$errors->message` (human-readable summary) and `$errors->errors` (keyed by field for 422, flat list otherwise).

### Models

API methods return `ApiResult` wrapping typed models. Request bodies accept a model instance or raw array:

```php
$result = $api->getWidget('01H');
$result->data->name; // 'Sprocket'

// Both forms work for request bodies
$api->updateWidget('01H', ['name' => 'Renamed']);
$api->updateWidget('01H', UpdateWidgetRequest::from(['name' => 'Renamed']));
```

An endpoint whose body is a bare JSON array (`[{...}, {...}]`, not `{"widgets": [...]}`) declares
`listOf:` instead of `response:` on its `#[AdminApi]`, and `$result->data` is a typed list —
`array<int, WidgetTag>`. An empty body gives `[]`, never null:

```php
$result = $api->listWidgetTags('01H');

foreach ($result->data as $tag) {
    $tag->name; // 'featured'
}
```

#### Query parameters

Pass ad-hoc query parameters via `$options[Options::query]` — appended to the URL across all transports. Filtering uses Laravel-style `where`; eager loading uses Laravel-style `with`. Use the `Query` model's constants for the DSL keys (`Query::where`, `Query::where_in`, `Query::where_not_in`, `Query::per_page`, `Query::with`, `Query::fields`) so call sites stay in sync with the DSL — see [`src/Models/Query.php`](src/Models/Query.php) for the full per-key shape reference.

```php
use Zerotoprod\GitHubSdk\Models\Query;
use Zerotoprod\GitHubSdk\Options;

// where: 2-tuple (operator defaults to =)
$api->listWidgets([Options::query => [Query::where => ['status', 'active']]]);

// where: 3-tuple with explicit operator
$api->listWidgets([Options::query => [Query::where => ['name', 'LIKE', 'Sprocket%']]]);

// where: list of conditions
$api->listWidgets([Options::query => [Query::where => [['status', 'active'], ['name', 'Sprocket']]]]);

// where: associative shorthand (= only)
$api->listWidgets([Options::query => [Query::where => ['status' => 'active']]]);

// with: string, dot for nested, or array (incl. nested array)
$api->listWidgets([Options::query => [Query::per_page => 50, Query::with => ['owner', 'parts']]]);
$api->listWidgets([Options::query => [Query::where => ['status', 'active'], Query::with => 'owner.team']]);
$api->listWidgets([Options::query => [Query::with => ['owner' => ['team']]]]); // → with=owner.team

$api->getWidget('01H', [Options::query => [Query::fields => ['widgets' => ['id', 'name']]], 'timeout' => 5]);
```

#### Publishing models

Publish only the models you need to customize. Unpublished models fall back to package defaults automatically:

```bash
# Publish specific models
./vendor/bin/github-sdk publish:models 'App\Models\Sdk' WidgetsResponse Widget

# Or publish all models at once
./vendor/bin/github-sdk publish:models 'App\Models\Sdk'
```

Then set the namespace in your config:

```php
GitHubSdkConfig::model_namespace => 'App\\Models\\Sdk',
```

Add a custom method to a published model — the package uses your version for API responses:

```php
// app/Models/Sdk/Widget.php (published)
namespace App\Models\Sdk;

use Zerotoprod\GitHubSdk\Internal\DataModel;

class Widget
{
    use DataModel;
    // ... existing properties ...

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

// Pagination was not published — uses the vendor model automatically
$result = $api->listWidgets();
$result->data->Pagination->total; // works as normal
```

> A regenerated package overwrites `src/Models/`, so publishing is also how you keep a hand-written
> method across a `./run generate-sdk` run.

## Interoperability & Extensibility

Every layer is pluggable. Publish only what you want to customize — unpublished classes fall back to the vendor namespace per-class, so a partial publish is a supported workflow.

| Plug point        | How                                                          | Default                                       |
|-------------------|--------------------------------------------------------------|-----------------------------------------------|
| HTTP client       | Pass an `HttpTransport` to the constructor                   | `CurlHttpTransport`                           |
| Response caching  | Wrap the transport in `CachingHttpTransport`                 | None (no caching)                             |
| Model namespace   | `GitHubSdkConfig::model_namespace` + `publish:models`              | `Zerotoprod\GitHubSdk\Models`                       |
| Route set         | `GitHubSdkConfig::route_enum` — any string-backed enum with `#[AdminApi]` | `ApiRoute`                             |
| Factory namespace | `publish:factories <namespace> [factory...]`                 | `Zerotoprod\GitHubSdk\Factories`                    |
| Response shape    | `[Options::raw => true]` — skip `ApiResult` hydration        | `ApiResult` with hydrated `$data` / `$errors` |
| List responses    | `listOf: Model::class` on the route's `#[AdminApi]`           | `response:` — one hydrated object             |
| Request body      | Typed request model **or** raw array                         | —                                             |
| Headers, timeout  | `$options[Options::headers]`, `$options['timeout']`          | —                                             |
| Query params      | `$options[Options::query]`                                   | —                                             |
| Curl options      | `$options['curl']` (native `CURLOPT_*`)                      | `CurlHttpTransport` only                      |

Resolution is per-class: the dispatcher tries `{model_namespace}\{Model}` first and falls back to the vendor namespace if the class doesn't exist — so you can extend `Widget` without publishing `Pagination`. The same fallback applies to the `Errors` model on failure paths, and to the element class of a `listOf:` list response.

### Custom HttpTransport

Implement `Zerotoprod\GitHubSdk\HttpTransport`. The `@template TResponse` sets the return type when `[Options::raw => true]` is passed — so a Guzzle transport makes `raw` calls return `Psr\Http\Message\ResponseInterface`:

```php
use Zerotoprod\GitHubSdk\HttpTransport;

/** @implements HttpTransport<\Psr\Http\Message\ResponseInterface> */
class GuzzleTransport implements HttpTransport
{
    public function __construct(private \GuzzleHttp\ClientInterface $client) {}

    public function request(string $method, string $url, array $options = []): \Psr\Http\Message\ResponseInterface
    {
        return $this->client->request($method, $url, $options);
    }
}

$api = new GitHubSdk($config, new GuzzleTransport($client));
```

Options follow Guzzle conventions: `json`, `form_params`, `headers`, `query`, `timeout`. For the keys the package manages itself, prefer the `Options` constants — `Options::raw`, `Options::query`, `Options::headers` — so first-party call sites stay in sync with the option names even if the underlying strings change. `ApiResult` hydration only runs when the transport returns the package's own `Response`; custom transports that return a different type should be used with `Options::raw => true` (or return a `Response`).

### Caching responses

`CachingHttpTransport` is a decorator that wraps **any** `HttpTransport` and routes idempotent `GET` requests through a closure you supply — the closure owns the cache backend and TTL. Every non-`GET` request passes straight through, so mutations are never cached.

```php
use Zerotoprod\GitHubSdk\{GitHubSdk, CachingHttpTransport, CurlHttpTransport};
use Illuminate\Support\Facades\Cache;

$api = new GitHubSdk($config, new CachingHttpTransport(
    new CurlHttpTransport(),
    // fn (string $key, Closure $fetch): array — mirrors Cache::remember($key, $ttl, $fetch)
    fn (string $key, \Closure $fetch) => Cache::remember($key, 60, $fetch),
));

$api->getWidget('01H'); // hits the network; result cached
$api->getWidget('01H'); // served from cache — no HTTP call
```

The closure is the whole contract, so a dependency-free in-memory cache (memoization for the life of the process — handy for tests or a single CLI run) is just an array. Capture it **by reference** so writes persist across calls (an arrow `fn` captures by value and would not):

```php
$store = [];

$api = new GitHubSdk($config, new CachingHttpTransport(
    new CurlHttpTransport(),
    function (string $key, \Closure $fetch) use (&$store): array {
        return $store[$key] ??= $fetch();
    },
));
```

What gets stored is a serializable `['status', 'headers', 'body']` array — never the response object — so it survives any cache driver, including behind `LaravelHttpTransport` (whose stream-backed `Illuminate\Http\Client\Response` would not serialize). On a hit and a miss alike the array is rehydrated back into the transport's native response, so the return type is identical to an un-cached call.

The defaults target this package's own `Response` (returned by `CurlHttpTransport` and `Fake`). To cache a transport that returns a different type, pass matching `$normalize` / `$rehydrate` closures (and optionally `$keyFor` to control the cache key):

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

The default cache key hashes the method, URL, and options — and `options` includes request headers, so an `Authorization` / tenant header naturally isolates cache entries. Pass `$keyFor` to widen or narrow that scope.

> `GitHubSdk::fake()` hardwires the `Fake` transport, so wrap it explicitly to exercise caching in tests: `new GitHubSdk($config, new CachingHttpTransport(new Fake(), $cache))`.

### Composing decorators

`CachingHttpTransport` and `RetryingHttpTransport` both wrap an `HttpTransport` and return one, so
they nest. Order decides the behaviour:

```php
// Cache outermost: a cache hit costs nothing, and only a miss can retry.
new CachingHttpTransport(new RetryingHttpTransport(new CurlHttpTransport()), $cache)
```

That is usually the order you want — the alternative re-enters the cache lookup on every attempt,
which does no harm but buys nothing.

### Framework interop

- **Laravel** — `LaravelHttpTransport` returns `Illuminate\Http\Client\Response` directly, so `Http::fake()` and `Http::assertSent()` work natively (see *Testing with `Http::fake()`* above).
- **Any PSR-18 / Guzzle / Symfony HTTP client** — wrap it in a `HttpTransport` as shown above.
- **Claude Code / AI agents** — `publish:skill` drops a skill into `.claude/commands/`; `publish:docs` syncs package docs into your project and wires composer `post-install-cmd` / `post-update-cmd` hooks so they stay current on `composer update`.
