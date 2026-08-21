<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk;

use Zerotoprod\Sdk\Internal\AdminApi;
use Zerotoprod\Sdk\Internal\HasRoute;
use Zerotoprod\Sdk\Internal\HttpMethod;
use Zerotoprod\Sdk\Internal\Route;
use Zerotoprod\Sdk\Models\CreateWidgetRequest;
use Zerotoprod\Sdk\Models\Query;
use Zerotoprod\Sdk\Models\UpdateWidgetRequest;
use Zerotoprod\Sdk\Models\Widget;
use Zerotoprod\Sdk\Models\WidgetsResponse;
use Zerotoprod\Sdk\Models\WidgetTag;

/**
 * @method static Route widget(array<string, mixed> $params = [])
 * @method static Route widgets(array<string, mixed> $params = [])
 * @method static Route widgetTags(array<string, mixed> $params = [])
 */
enum ApiRoute: string
{
    /**
     * Example single-resource route. One case per path; one `#[AdminApi]`
     * per HTTP operation on that path. `composer generate-sdk` rewrites this
     * file from the OpenAPI document declared in `sdk.json`.
     * @link https://example.com/docs
     */
    #[HasRoute]
    #[AdminApi(HttpMethod::GET, 'getWidget', pathParams: ['id'], response: Widget::class)]
    #[AdminApi(HttpMethod::PATCH, 'updateWidget', pathParams: ['id'], request: UpdateWidgetRequest::class, response: Widget::class)]
    #[AdminApi(HttpMethod::DELETE, 'deleteWidget', pathParams: ['id'])]
    case widget = '/v1/widgets/{id}';

    /**
     * Example collection route.
     * @link https://example.com/docs
     */
    #[HasRoute]
    #[AdminApi(HttpMethod::GET, 'listWidgets', queryParams: [Query::where, Query::where_in, Query::where_not_in, Query::per_page, Query::with, Query::fields], response: WidgetsResponse::class)]
    #[AdminApi(HttpMethod::POST, 'createWidget', request: CreateWidgetRequest::class, response: Widget::class)]
    case widgets = '/v1/widgets';

    /**
     * Example bare-list route: the body is a JSON array, not an object, so the
     * operation declares `listOf:` instead of `response:` and `$result->data`
     * comes back as an `array<int, WidgetTag>`.
     * @link https://example.com/docs
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
