# zero-to-prod/github-sdk

A PHP SDK for the GitHub REST API generated from GitHub's [OpenAPI](https://raw.githubusercontent.com/github/rest-api-description/main/descriptions/api.github.com/api.github.com.json) document.

## Table of Contents

- [Install](#install)
- [Cli](#cli)
- [Basic Setup](#basic-setup)
  - [Authentication](#authentication)
  - [Find a method](#find-a-method)
  - [Query parameters](#query-parameters)
  - [Pagination](#pagination)
  - [Errors](#errors)
- [Lifecycle Hooks](#lifecycle-hooks)
  - [Hooks](#hooks)
  - [HookContext](#hookcontext)
  - [Retries](#retries)
  - [Timeouts](#timeouts)
  - [Caching responses](#caching-responses)
  - [Composing decorators](#composing-decorators)
- [Testing](#testing)
  - [Fake transport](#fake-transport)
  - [Testing with `Http::fake()`](#testing-with-httpfake)
  - [Factories](#factories)
  - [Publishing model factories](#publishing-model-factories)
- [Models](#models)
  - [Publishing models](#publishing-models)
- [Extending](#extending)
  - [Custom HttpTransport](#custom-httptransport)
  - [Agents](#agents)
- [Regenerating](#regenerating)

<!-- end toc -->

## Install

```bash
composer require zero-to-prod/github-sdk
```

PHP 8.1 or newer, with `ext-curl` and `ext-json`.

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

## Basic Setup

```php
use Zerotoprod\GitHubSdk\GitHubSdk;
use Zerotoprod\GitHubSdk\GitHubSdkConfig;

$api = new GitHubSdk([
    GitHubSdkConfig::url     => 'https://api.github.com',
    GitHubSdkConfig::headers => [
        'Authorization' => 'Bearer '.$token,
        'Accept'        => 'application/vnd.github+json',
    ],
]);

$repo = $api->getRepo('zero-to-prod', 'github-sdk');

$repo->data->full_name;        // 'zero-to-prod/github-sdk'
$repo->data->stargazers_count; // 3
```

Positional arguments are used:

```php
$api->createRepoIssue('zero-to-prod', 'github-sdk', [
    'title' => 'Bug',
    'body'  => 'It broke',
]);
```

You can use an array as the body or use the provided request DTO.

```php
use Zerotoprod\GitHubSdk\Models\CreateRepoIssueRequest;

$api->createRepoIssue('zero-to-prod', 'github-sdk', CreateRepoIssueRequest::from([
    CreateRepoIssueRequest::title => 'Bug',
]));
```

### Authentication

In this package you own the authentication. Set `GitHubSdkConfig::headers` for every request.

You can also override the headers of a single call with `Options::headers`.

```php
$api->getRepo('zero-to-prod', 'github-sdk', [
    Options::headers => ['Authorization' => 'Bearer '.$appToken],
]);
```

You can setup functions for that hook into the request lifecycle.

Here is an example of a token that rotates mid-process.

```php
$api = new GitHubSdk($config, new CurlHttpTransport(), [
    Hook::before->value => fn (HookContext $ctx) => $ctx->withHeaders([
        'Authorization' => 'Bearer '.$tokens->current(),
    ]),
]);
```

### Find a method

This package uses a simple `verbResource` naming convention:

- `getRepo`,
- `listRepoIssues`,
- `createRepoIssue`
- etc.

If you don't know the name of something, you can use the cli tools:

```bash
./vendor/bin/github-sdk list:api | grep -i pullreview
./vendor/bin/github-sdk list:models | grep -i ^Issue
./vendor/bin/github-sdk describe Repository 2
```

### Query parameters

The query param can be defined this way:

```php
use Zerotoprod\GitHubSdk\Options;

$api->listRepoIssues('zero-to-prod', 'github-sdk', [
    Options::query => ['state' => 'open', 'labels' => 'bug', 'per_page' => 50],
]);
// GET /repos/zero-to-prod/github-sdk/issues?state=open&labels=bug&per_page=50
```

### Pagination

This SDK uses pagination with `per_page` and `page`, and returns the next link in a header.

```php
$issues = $api->listRepoIssues('zero-to-prod', 'github-sdk', [
    Options::query => ['per_page' => 100, 'page' => 2],
]);

$issues->response->header('Link'); // '<https://api.github.com/...?page=3>; rel="next"'
```

### Errors

The `ApiResult` is returned for every request.

```php
$result = $api->getRepo('zero-to-prod', 'nope');

$result->failed();                            // true
$result->status();                            // 404
$result->errors->message;                     // 'Not Found'
$result->errors->errors;                      // GitHub's per-field errors, when it sends them
$result->response->header('x-ratelimit-remaining');
```

Get the raw response with `Options::raw`.

```php
$response = $api->getRepo('zero-to-prod', 'github-sdk', [Options::raw => true]);
$response->json('full_name');
```

## Lifecycle Hooks

This package provides several lifecycle hooks to add your custom logic.

```php
use Zerotoprod\GitHubSdk\{GitHubSdk, CurlHttpTransport, Hook, HookContext};

$api = new GitHubSdk($config, new CurlHttpTransport(), [
    Hook::before->value => [
        fn (HookContext $ctx) => $ctx->withHeaders(['X-Trace-Id' => bin2hex(random_bytes(8))]),
        fn (HookContext $ctx) => logger()->debug('Outgoing', $ctx->redacted()),
    ],
    Hook::after->value => [
        fn (HookContext $ctx) => logger()->info("{$ctx->HttpMethod->value} {$ctx->url} → {$ctx->response->status()}"),
    ],
    Hook::onException->value => [
        fn (HookContext $ctx, \Throwable $e) => logger()->error("{$ctx->url} failed: {$e->getMessage()}"),
    ],
]);
```

### Hooks

| Hook          | Key                                          | Signature                            | Can mutate?                                | `$response`            |
|---------------|----------------------------------------------|--------------------------------------|--------------------------------------------|------------------------|
| `before`      | `Hook::before->value` (`'before'`)           | `fn(HookContext): HookContext\|void` | Yes — return a `HookContext` to replace it | `null`                 |
| `after`       | `Hook::after->value` (`'after'`)             | `fn(HookContext): void`              | No                                         | the transport response |
| `onException` | `Hook::onException->value` (`'onException'`) | `fn(HookContext, Throwable): void`   | No                                         | `null`                 |

### HookContext

Lifecycle of a request:

```php
$ctx->Hook;       // Hook enum (before / after / onException)
$ctx->HttpMethod; // HttpMethod enum — ->value is 'GET', 'POST', ...
$ctx->url;        // fully qualified request URL
$ctx->options;    // Guzzle-compatible options array (json, headers, query, ...)
$ctx->response;   // transport response during `after`; null otherwise
```

```php
$ctx->withHeaders(['X-Trace-Id' => $id]); // merge headers — per-call headers survive
$ctx->withOptions(['timeout' => 5]);      // merge options — other options survive
$ctx->redacted();                         // array for logging, credentials masked
```

### Retries

You can wrap ny transport with `RetryingHttpTransport`.

```php
use Zerotoprod\GitHubSdk\{RetryingHttpTransport, CurlHttpTransport};

$api = new GitHubSdk($config, new RetryingHttpTransport(new CurlHttpTransport()));

$api = new GitHubSdk($config, new RetryingHttpTransport(
    inner: new CurlHttpTransport(),
    maxAttempts: 5,   // total attempts including the first; default 3, 1 disables retrying
    baseDelay: 0.25,  // seconds the backoff doubles from; default 0.5
    maxDelay: 10.0,   // ceiling for one sleep; default 30.0
));
```

### Timeouts

Use `CurlHttpTransport` to set the connect timeout apart from the total.

```php
$api->getRepo('zero-to-prod', 'github-sdk', [
    'timeout'         => 5, // total, seconds (default 30)
    'connect_timeout' => 2, // TCP connect only (default 10)
]);
```

### Caching responses

Use `CachingHttpTransport` to wrap any transport and routes for `GET` requests through a closure.

This only applies to `GET`.

```php
use Zerotoprod\GitHubSdk\{GitHubSdk, CachingHttpTransport, CurlHttpTransport};
use Illuminate\Support\Facades\Cache;

$api = new GitHubSdk($config, new CachingHttpTransport(
    new CurlHttpTransport(),
    // fn (string $key, Closure $fetch): array — mirrors Cache::remember($key, $ttl, $fetch)
    fn (string $key, \Closure $fetch) => Cache::remember($key, 60, $fetch),
));

$api->getRepo('zero-to-prod', 'github-sdk'); // hits the network; result cached
$api->getRepo('zero-to-prod', 'github-sdk'); // served from cache — no HTTP call
```

Example of in-memory caching:

```php
$store = [];

$api = new GitHubSdk($config, new CachingHttpTransport(
    new CurlHttpTransport(),
    function (string $key, \Closure $fetch) use (&$store): array {
        return $store[$key] ??= $fetch();
    },
));
```

Control the return type:

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

Setting up a fake transport:

```php
use Zerotoprod\GitHubSdk\Internal\Fake;

new GitHubSdk($config, new CachingHttpTransport(new Fake(), $cache));
```

### Composing decorators

You can use decorators for `HttpTransport` so they can nest. Order matters here.

```php
// Cache outermost: a hit costs nothing, and only a miss can retry.
new CachingHttpTransport(new RetryingHttpTransport(new CurlHttpTransport()), $cache);
```

## Testing

### Fake transport

Use `GitHubSdk::fake()` to set up an in-memory fake for testing.

```php
use Zerotoprod\GitHubSdk\{GitHubSdk, GitHubSdkConfig, Response, ApiRoute};

[$api, $fake] = GitHubSdk::fake([
    GitHubSdkConfig::url => 'https://api.github.com',
]);

$fake->queue(
    new Response(200, [], json_encode(['full_name' => 'zero-to-prod/github-sdk'])),
    new Response(404, [], json_encode(['message' => 'Not Found'])),
);

$found   = $api->getRepo('zero-to-prod', 'github-sdk');
$missing = $api->getRepo('zero-to-prod', 'nope');

$fake->assertSent('GET', '/repos/zero-to-prod/github-sdk'); // method + URL substring
$fake->assertNotSent('DELETE');
$fake->assertSentCount(2);

$fake->recorded()[0]['method']; // 'GET'
$fake->recorded()[0]['url'];    // 'https://api.github.com/repos/zero-to-prod/github-sdk'
```

Use `ApiRoute` to render the route:

```php
ApiRoute::repo->value;                                // '/repos/{owner}/{repo}'
ApiRoute::repo_issues->value;                         // '/repos/{owner}/{repo}/issues'
ApiRoute::repo_issues(['per_page' => 50])->render();  // '/repos/{owner}/{repo}/issues?per_page=50'
```

### Testing with `Http::fake()`

```php
use Illuminate\Support\Facades\Http;
use Zerotoprod\GitHubSdk\{GitHubSdk, LaravelHttpTransport, ApiRoute};

Http::fake([
    '*/repos/zero-to-prod/github-sdk' => Http::response(['full_name' => 'zero-to-prod/github-sdk'], 200),
]);

$response = (new GitHubSdk([], new LaravelHttpTransport()))->getRepo('zero-to-prod', 'github-sdk');

self::assertTrue($response->ok());
Http::assertSent(fn ($r) => str_ends_with($r->url(), '/repos/zero-to-prod/github-sdk'));
```

### Factories

There are three factories you can use for testing:

- `ErrorsFactory`,
- `PaginationFactory`,
- `GitHubSdkConfigFactory`

```php
use Zerotoprod\GitHubSdk\Factories\{ErrorsFactory, GitHubSdkConfigFactory};
use Zerotoprod\GitHubSdk\Models\Errors;

[$api, $fake] = GitHubSdk::fake(GitHubSdkConfigFactory::factory()->context());

$fake->queue(new Response(404, [], ErrorsFactory::factory()
    ->set(Errors::message, 'Not Found')
    ->json()));
```

`->context()` returns an array of the model.

### Publishing model factories

Publish model factories in your project for testing:

```bash
./vendor/bin/github-sdk publish:factories 'App\Factories\GitHub'
```

## Models

`ApiResult::$data` holds a hydrated model.

```php
$issues = $api->listRepoIssues('zero-to-prod', 'github-sdk');

foreach ($issues->data as $issue) {
    $issue->title;
    $issue->user->login;
}
```

### Publishing models

You can be selective with the publishing of models.

```bash
./vendor/bin/github-sdk publish:models 'App\Models\GitHub' Repository Issue
./vendor/bin/github-sdk publish:models 'App\Models\GitHub'   # all 1,575
```

Configure the projects namespace:

```php
GitHubSdkConfig::model_namespace => 'App\\Models\\GitHub',
```

```php
// app/Models/GitHub/Repository.php (published)
namespace App\Models\GitHub;

use Zerotoprod\GitHubSdk\Internal\DataModel;

class Repository
{
    use DataModel;
    // ... generated properties ...

    public function isActive(): bool
    {
        return $this->archived === false && $this->disabled === false;
    }
}
```

## Extending

| Plug point        | How                                                                       | Default                              |
|-------------------|---------------------------------------------------------------------------|--------------------------------------|
| HTTP client       | Pass an `HttpTransport` to the constructor                                | `CurlHttpTransport`                  |
| Retries           | Wrap the transport in `RetryingHttpTransport`                             | None                                 |
| Response caching  | Wrap the transport in `CachingHttpTransport`                              | None                                 |
| Model namespace   | `GitHubSdkConfig::model_namespace` + `publish:models`                     | `Zerotoprod\GitHubSdk\Models`        |
| Route set         | `GitHubSdkConfig::route_enum` — any string-backed enum with `#[AdminApi]` | `ApiRoute`                           |
| Factory namespace | `publish:factories <namespace> [factory...]`                              | `Zerotoprod\GitHubSdk\Factories`     |
| Response shape    | `[Options::raw => true]` — skip `ApiResult` hydration                     | `ApiResult` with `$data` / `$errors` |
| Request body      | Typed request model or raw array                                          | —                                    |
| Headers, timeout  | `$options[Options::headers]`, `$options['timeout']`                       | —                                    |
| Query params      | `$options[Options::query]`                                                | —                                    |
| Curl options      | `$options['curl']` (native `CURLOPT_*`)                                   | `CurlHttpTransport` only             |

### Custom HttpTransport

Implement `Zerotoprod\GitHubSdk\HttpTransport`.

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

### Agents

`publish:skill` drops a skill into `.claude/commands/`.

`publish:docs` syncs the package docs into your project and wires composer `post-install-cmd` and `post-update-cmd` so they stay current.

## Regenerating

`src/Models/` and `src/ApiRoute.php` are generated. Do not hand-edit them.

The source is declared in `sdk.json`, and it is GitHub's published description.

```json
"openapi": {
    "source": "https://raw.githubusercontent.com/github/rest-api-description/main/descriptions/api.github.com/api.github.com.json"
}
```

```bash
composer generate-sdk              # uses openapi.source
composer generate-sdk -- --dry-run # print the plan, write nothing
composer fix                       # @link + @method annotations, README, TOC, static analysis, tests
```
