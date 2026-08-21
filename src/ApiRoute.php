<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk;

use Zerotoprod\GitHubSdk\Internal\AdminApi;
use Zerotoprod\GitHubSdk\Internal\HasRoute;
use Zerotoprod\GitHubSdk\Internal\HttpMethod;
use Zerotoprod\GitHubSdk\Internal\Route;
use Zerotoprod\GitHubSdk\Models\CreateWidgetRequest;
use Zerotoprod\GitHubSdk\Models\Query;
use Zerotoprod\GitHubSdk\Models\UpdateWidgetRequest;
use Zerotoprod\GitHubSdk\Models\Widget;
use Zerotoprod\GitHubSdk\Models\WidgetsResponse;
use Zerotoprod\GitHubSdk\Models\WidgetTag;

/**
 * @method static Route widget(array<string, mixed> $params = [])
 * @method static Route widgets(array<string, mixed> $params = [])
 * @method static Route widgetTags(array<string, mixed> $params = [])
 */
enum ApiRoute: string
{
    /**
     * Example single-resource route. One case per path; one `#[AdminApi]`
     * per HTTP operation on that path. `./run generate-sdk` rewrites this
     * file from the OpenAPI document declared in `sdk.json`.
     * @link https://docs.github.com/
     */
    #[HasRoute]
    #[AdminApi(HttpMethod::GET, 'getWidget', pathParams: ['id'], response: Widget::class)]
    #[AdminApi(HttpMethod::PATCH, 'updateWidget', pathParams: ['id'], request: UpdateWidgetRequest::class, response: Widget::class)]
    #[AdminApi(HttpMethod::DELETE, 'deleteWidget', pathParams: ['id'])]
    case widget = '/v1/widgets/{id}';

    /**
     * Example collection route.
     * @link https://docs.github.com/
     */
    #[HasRoute]
    #[AdminApi(HttpMethod::GET, 'listWidgets', queryParams: [Query::where, Query::where_in, Query::where_not_in, Query::per_page, Query::with, Query::fields], response: WidgetsResponse::class)]
    #[AdminApi(HttpMethod::POST, 'createWidget', request: CreateWidgetRequest::class, response: Widget::class)]
    case widgets = '/v1/widgets';

    /**
     * Example bare-list route: the body is a JSON array, not an object, so the
     * operation declares `listOf:` instead of `response:` and `$result->data`
     * comes back as an `array<int, WidgetTag>`.
     * @link https://docs.github.com/
     */
    #[HasRoute]
    #[AdminApi(HttpMethod::GET, 'listWidgetTags', pathParams: ['id'], listOf: WidgetTag::class)]
    case widgetTags = '/v1/widgets/{id}/tags';

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
