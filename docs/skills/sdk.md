# SDK

Use this skill when working with the `zero-to-prod/sdk` package — a framework-agnostic PHP SDK generated from an OpenAPI document.

This package is built from the SDK template. `src/Models/` and `src/ApiRoute.php` are generated from the OpenAPI document declared in `sdk.json`; everything else (transports, dispatch, hooks, options) is hand-written and shared. The example domain below is `Widget` — a derived package has its own resources, so run `./vendor/bin/sdk list:api` and `list:models` to see the real surface.

## Usage Patterns

### Create an instance

```php
use Zerotoprod\Sdk\SdkApi;
use Zerotoprod\Sdk\SdkConfig;

$api = new SdkApi([
    SdkConfig::url             => 'https://api.example.com', // required
    SdkConfig::model_namespace => 'App\\Models\\Sdk',        // optional — defaults to the package namespace
]);
```

### Testing with `SdkApi::fake()`

```php
use Zerotoprod\Sdk\SdkApi;
use Zerotoprod\Sdk\Response;

[$api, $fake] = SdkApi::fake($config);

$fake->queue(new Response(200, [], json_encode(['id' => 'wid-01', 'name' => 'Sprocket'])));
$result = $api->getWidget('wid-01');

$result->ok();            // true
$result->data->name;      // 'Sprocket'

$fake->assertSent('GET', '/v1/widgets/wid-01');
$fake->assertSentCount(1);
```

### Factories

The package ships factories under `Zerotoprod\Sdk\Factories` (backed by `zero-to-prod/data-model-factory`) for building models without writing raw arrays. Every model has a matching factory:

```php
use Zerotoprod\Sdk\Factories\{SdkConfigFactory, UpdateWidgetRequestFactory, WidgetFactory, WidgetsResponseFactory};
use Zerotoprod\Sdk\Models\UpdateWidgetRequest;
use Zerotoprod\Sdk\Models\Widget;

// Defaults
$widget = WidgetFactory::factory()->make();

// Override in the factory() call or fluently via set() (dot syntax for nested values)
$widget = WidgetFactory::factory([Widget::name => 'Override'])->make();
$widget = WidgetFactory::factory()->set(Widget::name, 'Sprocket')->make();

// Build a populated config for the API client
[$api, $fake] = SdkApi::fake(SdkConfigFactory::factory()->context()); // resolved array

// Queue a realistic response body without writing JSON by hand
$fake->queue(new Response(200, [], WidgetsResponseFactory::factory()->json() ?: ''));

// Pass a factory-built request model
$api->updateWidget('wid-01', UpdateWidgetRequestFactory::factory()
    ->set(UpdateWidgetRequest::name, 'Renamed')
    ->make());
```

**Prefer `->context()` over `->make()->toArray()`** when composing factories inside another factory's `definition()` — it returns the resolved array without the hydrate → serialize round trip.

**Publishing factories** — copy factories into your project's namespace so you can extend them:

```bash
./vendor/bin/sdk publish:factories 'App\Factories\Sdk'                # all
./vendor/bin/sdk publish:factories 'App\Factories\Sdk' WidgetFactory  # subset
```

Unpublished factories stay available from the vendor namespace. References to non-co-published siblings are auto-imported from vendor, so partial publishing works.

### Testing with Laravel `Http::fake()`

```php
use Illuminate\Support\Facades\Http;
use Zerotoprod\Sdk\SdkApi;
use Zerotoprod\Sdk\LaravelHttpTransport;

Http::fake(['*/v1/widgets/*' => Http::response(['id' => 'wid-01'], 200)]);

$api = new SdkApi($config, new LaravelHttpTransport());
$result = $api->getWidget('wid-01');

Http::assertSent(fn ($r) => str_contains($r->url(), '/v1/widgets/wid-01'));
```

### Options

All methods accept an `$options` array passed to the transport: `headers`, `timeout`, `query`, `json`, plus `raw` (skip `ApiResult` wrapping) and `curl` (native curl options, `CurlHttpTransport` only). Prefer the `Options` constants — `Options::raw`, `Options::query`, `Options::headers` — so call sites stay in sync with the option names.

```php
use Zerotoprod\Sdk\Options;

$api->getWidget($id, [
    'timeout'        => 5,
    Options::headers => ['X-Request-Id' => 'abc'],
]);
```

### Query parameters

Pass query parameters via `$options[Options::query]`, built from the `Query` DSL constants — appended to the URL by all transports:

```php
use Zerotoprod\Sdk\Models\Query;
use Zerotoprod\Sdk\Options;

// Filter and paginate a collection
$api->listWidgets([Options::query => [
    Query::where    => ['status', 'active'],
    Query::per_page => 50,
    Query::with     => ['parts'],
]]);

// Sparse fieldset
$api->getWidget($id, [Options::query => [Query::fields => ['widgets' => ['id', 'name']]]]);
```

### Lifecycle hooks

Pass a third constructor argument to run closures around **every** HTTP request — logging, tracing, global headers, metrics. Hooks are keyed by phase (`Hook::before->value`, `Hook::after->value`, `Hook::onException->value`) and accept **either a single callable or a list**:

```php
use Zerotoprod\Sdk\{SdkApi, HookContext, Hook, Options};

$api = new SdkApi($config, new CurlHttpTransport(), [
    // before: observe and optionally mutate the request (return a HookContext to alter it)
    Hook::before->value => fn (HookContext $ctx): HookContext => HookContext::from([
        ...$ctx->toArray(),
        HookContext::options => [...$ctx->options, Options::headers => ['X-Trace-Id' => $traceId]],
    ]),
    // after: observe the response (read-only; $ctx->response is set)
    Hook::after->value => [
        fn (HookContext $ctx) => logger()->info("{$ctx->HttpMethod->value} {$ctx->url} → {$ctx->response->status()}"),
    ],
    // onException: observe a transport failure before it is re-thrown
    Hook::onException->value => [
        fn (HookContext $ctx, \Throwable $e) => logger()->error("{$ctx->url}: {$e->getMessage()}"),
    ],
]);
```

- `before` hooks run in registration order; returning a `HookContext` replaces the outgoing request (the next hook sees the mutation). Any other return value is ignored.
- `after` hooks run on success with `$ctx->response` populated; observe only.
- `onException` hooks run when the transport throws, then the exception is re-thrown — `after` hooks do **not** run.
- Hooks fire for every API method. Scope a hook by inspecting `$ctx->url` / `$ctx->HttpMethod`.

`HookContext` is an immutable snapshot: `$ctx->Hook`, `$ctx->HttpMethod`, `$ctx->url`, `$ctx->options`, `$ctx->response`. Properties are `readonly` — mutate via `HookContext::from([...$ctx->toArray(), ...])`.

`SdkApi::fake()` does not take hooks — to test them, construct the client with a `Fake` transport and the `$hooks` array:

```php
use Zerotoprod\Sdk\Internal\Fake;

$fake = new Fake();
$fake->queue(new Response(200, [], json_encode([])));

$captured = null;
$api = new SdkApi($config, $fake, [
    Hook::before->value => fn (HookContext $ctx) => $captured = $ctx,
]);

$api->getWidget('wid-01');
// $captured->url, $captured->HttpMethod->value === 'GET'
```

### Error handling

Methods return an `ApiResult` by default. On 2xx `$result->data` holds the hydrated response model — or, for a route declaring `listOf: Model::class` because its body is a bare JSON array, an `array<int, Model>` (`[]` when empty). On non-2xx `$result->errors` holds the hydrated `Errors` model. The raw `Response` is always available via `$result->response`.

```php
$result = $api->getWidget('missing-id');

if ($result->failed()) {
    $result->status();                        // 404
    $result->errors->message;                 // 'Widget not found'
    $result->errors->errors;                  // flat list or field-keyed map (422)
    $result->response->header('X-Request-Id');
    return;
}

$result->data->name;
```

The `Errors` model shape:
- `message: ?string` — human-readable summary
- `errors: array<int|string, mixed>` — keyed by field for validation failures (422), flat list otherwise

**Common status codes:** 400 validation, 401 unauthorized, 404 not found, 422 unprocessable entity (check `errors` by field name), 500 server error.

Pass `Options::raw => true` to bypass `ApiResult` and get the transport response directly:

```php
$response = $api->getWidget($id, [Options::raw => true]);
$response->status();          // 200
$response->json('name');      // decoded value
```

### Request bodies

Methods with a request body accept either the typed request model or a raw array:

```php
use Zerotoprod\Sdk\Models\UpdateWidgetRequest;

$api->updateWidget($id, ['name' => 'Renamed']);
$api->updateWidget($id, UpdateWidgetRequest::from(['name' => 'Renamed']));
```

## API Surface

Run `./vendor/bin/sdk list:api` for the public API surface and `./vendor/bin/sdk list:models` for the models. All API methods return `ApiResult<TResponseModel>|TResponse` (the transport's response type when `Options::raw => true`).

## Common Tasks

Method names follow `verb<Resource>`: `get`/`update`/`delete` on a single resource, `list` on a collection, `create` for a POST to the collection.

```php
// Get one
$result = $api->getWidget($widgetId);
$result->data->name;

// List with filters (where, where_in, where_not_in, per_page, with, fields)
$result = $api->listWidgets([Options::query => [
    Query::where    => ['status', 'active'],
    Query::per_page => 50,
]]);
foreach ($result->data->widgets as $widget) {
    echo $widget->name;
}

// Paginate
$result->data->Pagination?->current_page;
$result->data->Pagination?->total;

// Create
$result = $api->createWidget(['name' => 'Sprocket', 'status' => 'active']);

// Update (PATCH — only provided fields change)
$result = $api->updateWidget($widgetId, ['name' => 'Renamed']);

// Delete
$api->deleteWidget($widgetId);
```

## Interoperability & Extensibility

Every layer is pluggable. Unpublished models and factories fall back to the vendor namespace **per-class**, so a partial publish is supported — extend `Widget` without publishing `WidgetsResponse`.

| Plug point        | How                                                            | Default                        |
|-------------------|----------------------------------------------------------------|--------------------------------|
| HTTP client       | Inject an `HttpTransport` via the constructor                  | `CurlHttpTransport`            |
| Response caching  | Wrap the transport in `CachingHttpTransport`                   | None (no caching)              |
| Model namespace   | `SdkConfig::model_namespace` + `publish:models`                | `Zerotoprod\Sdk\Models`        |
| Factory namespace | `publish:factories <namespace> [factory...]`                   | `Zerotoprod\Sdk\Factories`     |
| Response shape    | `[Options::raw => true]` — skip `ApiResult` hydration          | `ApiResult` with `$data`/`$errors` |
| List responses    | `listOf: Model::class` on the route's `#[AdminApi]`             | `response:` — one hydrated object   |
| Request body      | Typed request model **or** raw array                           | —                              |
| Headers, timeout  | `$options[Options::headers]`, `$options['timeout']`            | —                              |
| Query params      | `$options[Options::query]` with the `Query` constants          | —                              |
| Curl options      | `$options['curl']` (native `CURLOPT_*`)                        | `CurlHttpTransport` only       |

Resolution: the dispatcher tries `{model_namespace}\{Model}` first, then falls back to the vendor class. The `Errors` model follows the same rule on failure paths.

## Publishing models

Publish only the models you want to extend. Unpublished models fall back to the package defaults:

```bash
# Specific models
./vendor/bin/sdk publish:models 'App\Models\Sdk' WidgetsResponse Widget

# Or everything
./vendor/bin/sdk publish:models 'App\Models\Sdk'
```

Point config at the new namespace:

```php
SdkConfig::model_namespace => 'App\\Models\\Sdk',
```

Add methods to a published model — the package hydrates API responses into your version:

```php
// app/Models/Sdk/Widget.php (published)
namespace App\Models\Sdk;

use Zerotoprod\Sdk\Internal\DataModel;

class Widget
{
    use DataModel;
    // ... generated properties ...

    public function label(): string
    {
        return $this->name ?? $this->id ?? 'Unknown';
    }
}
```

```php
$api->getWidget($widgetId)->data->label();  // uses your override
```

Published models are copies: regenerating the package's `src/Models/` does not update them. Re-publish after a regeneration that changes a field you rely on.

## Implementing a Custom HttpTransport

Implement `Zerotoprod\Sdk\HttpTransport`. The `@template TResponse` generic determines the return type of all `SdkApi` methods when `Options::raw => true` is passed.

```php
use Zerotoprod\Sdk\HttpTransport;

/** @implements HttpTransport<YourResponseType> */
class YourTransport implements HttpTransport
{
    /**
     * @param  string                $method   HTTP method (GET, POST, PATCH, DELETE)
     * @param  string                $url      Fully qualified URL
     * @param  array<string, mixed>  $options  headers, json, query, timeout, curl, raw
     * @return YourResponseType
     */
    public function request(string $method, string $url, array $options = []): mixed
    {
        // Map options to your HTTP client, return its native response.
    }
}
```

### Guzzle example

```php
/** @implements HttpTransport<\Psr\Http\Message\ResponseInterface> */
class GuzzleTransport implements HttpTransport
{
    public function __construct(private \GuzzleHttp\ClientInterface $client) {}

    public function request(string $method, string $url, array $options = []): \Psr\Http\Message\ResponseInterface
    {
        return $this->client->request($method, $url, $options);
    }
}
```

### Inject via constructor

```php
$api = new SdkApi($config, new YourTransport());
```

## Caching responses

`CachingHttpTransport` decorates any `HttpTransport` and caches idempotent `GET` requests through a closure you supply (the closure owns the backend + TTL). Non-`GET` requests always pass through, so mutations are never cached.

```php
use Zerotoprod\Sdk\{SdkApi, CachingHttpTransport, CurlHttpTransport};
use Illuminate\Support\Facades\Cache;

$api = new SdkApi($config, new CachingHttpTransport(
    new CurlHttpTransport(),
    // fn (string $key, Closure $fetch): array — mirrors Cache::remember($key, $ttl, $fetch)
    fn (string $key, \Closure $fetch) => Cache::remember($key, 60, $fetch),
));

$api->getWidget('wid-01'); // hits the network; result cached
$api->getWidget('wid-01'); // served from cache — no HTTP call
```

A dependency-free in-memory cache (process-lifetime memoization) is just an array captured **by reference** (an arrow `fn` captures by value and would not persist writes):

```php
$store = [];

$api = new SdkApi($config, new CachingHttpTransport(
    new CurlHttpTransport(),
    function (string $key, \Closure $fetch) use (&$store): array {
        return $store[$key] ??= $fetch();
    },
));
```

What is stored is a serializable `['status', 'headers', 'body']` array (never the response object), so it survives any cache driver — including behind `LaravelHttpTransport`, whose stream-backed `Illuminate\Http\Client\Response` would not serialize. On a hit and a miss alike the array is rehydrated into the transport's native response type, so the return type matches an un-cached call.

The defaults target this package's `Response` (returned by `CurlHttpTransport` and `Fake`). To cache a transport that returns a different type, pass matching `$normalize` / `$rehydrate` closures, and optionally `$keyFor` to control the cache key:

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

The default cache key hashes method + URL + options; since `options` includes request headers, an `Authorization` / tenant header naturally isolates entries — pass `$keyFor` to change that scope.

`SdkApi::fake()` hardwires the `Fake` transport, so wrap it explicitly to test caching: `new SdkApi($config, new CachingHttpTransport(new Fake(), $cache))`.

## CLI reference

```bash
./vendor/bin/sdk
```

Key commands:

- `list:api` — print the public API surface (used by coverage tooling)
- `list:models [class]` — enumerate models or describe one's properties
- `describe <class> [depth]` — recursive property tree
- `generate:sdk [<openapi>] [flags]` — regenerate `src/Models/` and `src/ApiRoute.php` from an OpenAPI document (template checkout only; `scripts/` is not shipped with the installed package)
- `publish:skill` — copy this skill file into `<project>/.claude/commands/`
- `publish:models <ns> [models]` — copy model classes into your project and rewrite their namespace
- `publish:factories <ns> [factories]` — copy factory classes into your project and rewrite their namespace
- `publish:docs [path]` — copy `docs/` into the consuming project and wire up `zero-to-prod-data-model-helper` in composer scripts

## Adding or changing routes

- Generated package (`openapi.source` set in `sdk.json`): update the OpenAPI document, then `./run generate-sdk`. Never hand-edit `src/Models/` or `src/ApiRoute.php`.
- Hand-maintained package (`openapi.source: null`): add an `ApiRoute` case with `#[HasRoute]` + `#[AdminApi]` and the models it references, then `./run fix-all`.
