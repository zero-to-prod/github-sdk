<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use Tests\Fixtures\Models\FixtureCreateThingRequest;
use Tests\Fixtures\Models\FixtureDeleteLabelRequest;
use Tests\Fixtures\Models\FixtureThing;
use Tests\Fixtures\Models\FixtureThingsResponse;
use Tests\Fixtures\Models\FixtureThingTag;
use Tests\Fixtures\Models\FixtureUpdateThingRequest;
use Zerotoprod\GitHubSdk\Internal\AdminApi;
use Zerotoprod\GitHubSdk\Internal\HasRoute;
use Zerotoprod\GitHubSdk\Internal\HttpMethod;
use Zerotoprod\GitHubSdk\Internal\Route;
use Zerotoprod\GitHubSdk\Models\Query;

/**
 * The route enum the shared test suite dispatches against.
 *
 * `./run generate-sdk` rewrites `src/ApiRoute.php` wholesale from the package's
 * OpenAPI document, so a test that dispatched `getWidget` would break the moment
 * a derived package generated its real routes — and the tests for the shared
 * dispatcher, transports, hooks and `Route` are exactly the tests that must keep
 * merging downstream forever. They therefore run against this enum instead,
 * selected per client with `GitHubSdkConfig::route_enum`, and nothing the generator
 * writes can touch it.
 *
 * Between them the cases below reach every branch of `GitHubSdk::__call()`:
 *
 *  - `thing`      GET one object, PATCH with a body, DELETE with no body
 *  - `things`     GET a collection with the full query DSL, POST with a body
 *  - `thingTags`  GET a bare JSON array (`listOf:`)
 *  - `thingLabel` two path params **and** a DELETE that declares a request body
 *
 * The last case covers the two branches the shipped example domain cannot
 * reach: its paths carry at most one placeholder, and none of its non-GET
 * operations is a DELETE with a body.
 *
 * @method static Route thing(array<string, mixed> $params = [])
 * @method static Route things(array<string, mixed> $params = [])
 * @method static Route thingTags(array<string, mixed> $params = [])
 * @method static Route thingLabel(array<string, mixed> $params = [])
 */
enum FixtureRoute: string
{
    #[HasRoute]
    #[AdminApi(HttpMethod::GET, 'getThing', pathParams: ['id'], response: FixtureThing::class)]
    #[AdminApi(HttpMethod::PATCH, 'updateThing', pathParams: ['id'], request: FixtureUpdateThingRequest::class, response: FixtureThing::class)]
    #[AdminApi(HttpMethod::DELETE, 'deleteThing', pathParams: ['id'])]
    case thing = '/v1/things/{id}';

    #[HasRoute]
    #[AdminApi(HttpMethod::GET, 'listThings', queryParams: [Query::where, Query::where_in, Query::where_not_in, Query::per_page, Query::with, Query::fields], response: FixtureThingsResponse::class)]
    #[AdminApi(HttpMethod::POST, 'createThing', request: FixtureCreateThingRequest::class, response: FixtureThing::class)]
    case things = '/v1/things';

    #[HasRoute]
    #[AdminApi(HttpMethod::GET, 'listThingTags', pathParams: ['id'], listOf: FixtureThingTag::class)]
    case thingTags = '/v1/things/{id}/tags';

    #[HasRoute]
    #[AdminApi(HttpMethod::DELETE, 'deleteThingLabel', pathParams: ['id', 'label'], request: FixtureDeleteLabelRequest::class)]
    case thingLabel = '/v1/things/{id}/labels/{label}';

    /** @param  array<int, mixed>  $arguments */
    public static function __callStatic(string $name, array $arguments): Route
    {
        /** @var self $case */
        $case = constant(self::class . "::$name");

        /** @var array<string, mixed> $params */
        $params = $arguments[0] ?? [];

        return Route::for($case, $params);
    }
}
