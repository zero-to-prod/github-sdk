<?php

namespace Unit;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\Sdk\ApiResult;
use Zerotoprod\Sdk\ApiRoute;
use Zerotoprod\Sdk\CurlHttpTransport;
use Zerotoprod\Sdk\Factories\ErrorsFactory;
use Zerotoprod\Sdk\Factories\SdkConfigFactory;
use Zerotoprod\Sdk\Factories\UpdateWidgetRequestFactory;
use Zerotoprod\Sdk\Factories\WidgetFactory;
use Zerotoprod\Sdk\Factories\WidgetsResponseFactory;
use Zerotoprod\Sdk\LaravelHttpTransport;
use Zerotoprod\Sdk\Models\Errors;
use Zerotoprod\Sdk\Models\Query;
use Zerotoprod\Sdk\Models\UpdateWidgetRequest;
use Zerotoprod\Sdk\Models\Widget;
use Zerotoprod\Sdk\Models\WidgetsResponse;
use Zerotoprod\Sdk\Models\WidgetStatus;
use Zerotoprod\Sdk\Models\WidgetTag;
use Zerotoprod\Sdk\Options;
use Zerotoprod\Sdk\Response;
use Zerotoprod\Sdk\SdkApi;
use Zerotoprod\Sdk\SdkConfig;

/**
 * Mirrors every code block in README.md to prove each example is correct.
 * If you edit an example in the README, update the matching test here.
 */
class ReadmeExamplesTest extends TestCase
{
    // ─── Quick Start (README §Quick Start) ─────────────────────────

    #[Test]
    public function quick_start_instantiates_and_reads_property(): void
    {
        [$api, $fake] = SdkApi::fake([
            SdkConfig::url => 'https://api.example.com',
        ]);
        $fake->queue(new Response(200, [], json_encode(['name' => 'Sprocket']) ?: ''));

        $name = $api->getWidget('01HABCDEF...')->data->name;

        self::assertSame('Sprocket', $name);
    }

    // ─── Testing with Http::fake() (README §Testing with Http::fake()) ──

    #[Test]
    public function laravel_http_fake_round_trip(): void
    {
        Facade::clearResolvedInstances();
        Facade::setFacadeApplication(new Container());

        try {
            // Static-array fake — key is the rendered route.
            // Laravel prepends `*` to array keys internally, so the path
            // matches any request URL ending with `/v1/widgets`.
            Http::fake([
                ApiRoute::widgets()->render() => Http::response(
                    WidgetsResponseFactory::factory()->context(),
                    200,
                ),
            ]);

            // Empty config; LaravelHttpTransport returns Illuminate\Http\Client\Response
            $response = (new SdkApi([], new LaravelHttpTransport()))->listWidgets();

            self::assertTrue($response->ok());
            Http::assertSent(fn($r) => str_ends_with($r->url(), ApiRoute::widgets()->render()));
        } finally {
            Facade::clearResolvedInstances();
            Facade::setFacadeApplication(null);
        }
    }

    // ─── Concepts > SdkConfig (README §Concepts) ───────────────────

    #[Test]
    public function config_from_array_resolves_url_model_namespace_and_route_enum(): void
    {
        $config = [
            SdkConfig::url             => 'https://api.example.com',
            SdkConfig::model_namespace => 'App\\Models\\Sdk',
            SdkConfig::route_enum      => ApiRoute::class,
        ];

        $resolved = SdkConfig::from($config);

        self::assertSame('https://api.example.com', $resolved->url);
        self::assertSame('App\\Models\\Sdk', $resolved->model_namespace);
        self::assertSame(ApiRoute::class, $resolved->route_enum);
    }

    // ─── Concepts > HttpTransport variants ─────────────────────────

    #[Test]
    public function constructor_accepts_three_transport_variants(): void
    {
        $config = [SdkConfig::url => 'https://api.example.com'];

        $default = new SdkApi($config);
        $curl    = new SdkApi($config, new CurlHttpTransport());
        $laravel = new SdkApi($config, new LaravelHttpTransport());

        self::assertSame('https://api.example.com', $default->config->url);
        self::assertSame('https://api.example.com', $curl->config->url);
        self::assertSame('https://api.example.com', $laravel->config->url);
    }

    // ─── Concepts > Response ───────────────────────────────────────

    #[Test]
    public function response_accessors_match_example(): void
    {
        $response = new Response(
            200,
            ['Content-Type' => 'application/json'],
            '{"widgets":[{"id":"01H"}]}',
        );

        self::assertTrue($response->ok());
        self::assertFalse($response->failed());
        self::assertSame(200, $response->status());
        self::assertSame(['widgets' => [['id' => '01H']]], $response->json());
        self::assertSame([['id' => '01H']], $response->json('widgets'));
        self::assertSame('fallback', $response->json('missing', 'fallback'));
        self::assertSame('application/json', $response->header('Content-Type'));
        self::assertSame('{"widgets":[{"id":"01H"}]}', $response->body);
    }

    // ─── Concepts > ApiResult ──────────────────────────────────────

    #[Test]
    public function api_result_shape_matches_example(): void
    {
        [$api, $fake] = SdkApi::fake([SdkConfig::url => 'https://api.example.com']);
        $fake->queue(new Response(200, [], json_encode(['name' => 'Sprocket']) ?: ''));

        $result = $api->getWidget('01H');

        self::assertInstanceOf(ApiResult::class, $result);
        self::assertTrue($result->ok());
        self::assertFalse($result->failed());
        self::assertSame(200, $result->status());
        self::assertInstanceOf(Widget::class, $result->data);
        self::assertNull($result->errors);
        self::assertInstanceOf(Response::class, $result->response);
    }

    // ─── Concepts > ApiRoute ───────────────────────────────────────

    #[Test]
    public function api_route_value_and_render(): void
    {
        self::assertSame('/v1/widgets', ApiRoute::widgets->value);
        self::assertSame('/v1/widgets/{id}', ApiRoute::widget->value);
        self::assertSame('/v1/widgets?per_page=50', ApiRoute::widgets(['per_page' => 50])->render());
    }

    // ─── Testing with Fake > raw arrays (README §Testing with Fake) ─

    #[Test]
    public function fake_with_raw_arrays_queue_and_assert(): void
    {
        [$api, $fake] = SdkApi::fake([
            SdkConfig::url => 'https://api.example.com',
        ]);

        $fake->queue(
            new Response(200, [], json_encode(['id' => '01H', 'name' => 'Sprocket']) ?: ''),
            new Response(404, [], json_encode(['message' => 'Widget not found']) ?: ''),
        );

        $success = $api->getWidget('01H');
        $failure = $api->getWidget('missing');

        $fake->assertSent('GET', ApiRoute::widgets->value);
        $fake->assertNotSent('DELETE');
        $fake->assertSentCount(2);

        self::assertSame('GET', $fake->recorded()[0]['method']);
        self::assertSame(
            'https://api.example.com/v1/widgets/01H',
            $fake->recorded()[0]['url'],
        );
        self::assertTrue($success->ok());
        self::assertTrue($failure->failed());
    }

    // ─── Testing with Fake > factories ─────────────────────────────

    #[Test]
    public function fake_with_factory_built_bodies(): void
    {
        [$api, $fake] = SdkApi::fake([
            SdkConfig::url => 'https://api.example.com',
        ]);

        $fake->queue(
            new Response(200, [], WidgetFactory::factory()
                ->set(Widget::name, 'Sprocket')
                ->json() ?: ''),
            new Response(404, [], ErrorsFactory::factory()
                ->set(Errors::message, 'Widget not found')
                ->json() ?: ''),
        );

        $success = $api->getWidget('01H');
        $failure = $api->getWidget('missing');

        self::assertTrue($success->ok());
        self::assertSame('Sprocket', $success->data->name);
        self::assertTrue($failure->failed());
        self::assertSame('Widget not found', $failure->errors->message);
    }

    // ─── Factories > defaults ──────────────────────────────────────

    #[Test]
    public function factory_default_make_matches_example(): void
    {
        $widget = WidgetFactory::factory()->make();

        self::assertSame('Example widget', $widget->name);
    }

    // ─── Factories > initial context override ──────────────────────

    #[Test]
    public function factory_initial_context_override(): void
    {
        $widget = WidgetFactory::factory([
            Widget::name => 'Override',
        ])->make();

        self::assertSame('Override', $widget->name);
    }

    // ─── Factories > fluent set() ──────────────────────────────────

    #[Test]
    public function factory_fluent_set_chain(): void
    {
        $widget = WidgetFactory::factory()
            ->set(Widget::name, 'Sprocket')
            ->set(Widget::status, WidgetStatus::archived->value)
            ->make();

        self::assertSame('Sprocket', $widget->name);
        self::assertSame(WidgetStatus::archived, $widget->status);
    }

    // ─── Factories > config factory feeds fake() ───────────────────

    #[Test]
    public function factory_config_feeds_fake(): void
    {
        [$api, $fake] = SdkApi::fake(
            SdkConfigFactory::factory()->context(),
        );

        self::assertInstanceOf(SdkApi::class, $api);
        self::assertSame('https://api.example.com', $api->config->url);
    }

    // ─── Factories > queue response from factory ───────────────────

    #[Test]
    public function factory_queues_paginated_response(): void
    {
        [$api, $fake] = SdkApi::fake(SdkConfigFactory::factory()->context());
        $fake->queue(new Response(200, [], WidgetsResponseFactory::factory()->json() ?: ''));

        $result = $api->listWidgets();

        self::assertInstanceOf(WidgetsResponse::class, $result->data);
        self::assertSame('Example widget', $result->data->widgets[0]->name);
    }

    // ─── Factories > request body via factory ──────────────────────

    #[Test]
    public function factory_request_body_serialises_into_json(): void
    {
        [$api, $fake] = SdkApi::fake(SdkConfigFactory::factory()->context());
        $fake->queue(new Response(200, [], WidgetFactory::factory()->json() ?: ''));

        $api->updateWidget('01H', UpdateWidgetRequestFactory::factory()
            ->set(UpdateWidgetRequest::name, 'Renamed')
            ->make());

        $recorded = $fake->recorded()[0];
        self::assertSame('Renamed', $recorded['options']['json']['name']);
    }

    // ─── Error Handling (README §Error Handling) ───────────────────

    #[Test]
    public function error_handling_on_failed_result(): void
    {
        [$api, $fake] = SdkApi::fake([SdkConfig::url => 'https://api.example.com']);
        $fake->queue(new Response(
            404,
            ['X-Request-Id' => 'req-123'],
            json_encode(['message' => 'Widget not found']) ?: '',
        ));

        $result = $api->getWidget('missing-id');

        self::assertTrue($result->failed());
        self::assertSame(404, $result->status());
        self::assertSame('Widget not found', $result->errors->message);
        self::assertIsArray($result->errors->errors);
        self::assertSame('req-123', $result->response->header('X-Request-Id'));
    }

    #[Test]
    public function raw_option_returns_transport_response_directly(): void
    {
        [$api, $fake] = SdkApi::fake([SdkConfig::url => 'https://api.example.com']);
        $fake->queue(new Response(200, [], json_encode(['id' => '01H']) ?: ''));

        $response = $api->getWidget('01H', [Options::raw => true]);

        self::assertInstanceOf(Response::class, $response);
        self::assertSame(200, $response->status());
    }

    // ─── Errors model shape (README §Errors model) ─────────────────

    #[Test]
    public function errors_model_has_message_and_errors_fields(): void
    {
        [$api, $fake] = SdkApi::fake([SdkConfig::url => 'https://api.example.com']);
        $fake->queue(new Response(422, [], json_encode([
            'message' => 'validation failed',
            'errors' => ['name' => ['The name must be a string.']],
        ]) ?: ''));

        $result = $api->updateWidget('01H', ['name' => 42]);

        self::assertSame('validation failed', $result->errors->message);
        self::assertSame(['name' => ['The name must be a string.']], $result->errors->errors);
    }

    // ─── Models > request body both forms (README §Models) ─────────

    #[Test]
    public function request_body_accepts_array_or_model(): void
    {
        [$api, $fake] = SdkApi::fake([SdkConfig::url => 'https://api.example.com']);
        $fake->queue(
            new Response(200, [], json_encode(['name' => 'Renamed']) ?: ''),
            new Response(200, [], json_encode(['name' => 'Renamed']) ?: ''),
        );

        $api->updateWidget('01H', ['name' => 'Renamed']);
        $api->updateWidget('01H', UpdateWidgetRequest::from(['name' => 'Renamed']));

        self::assertSame(['name' => 'Renamed'], $fake->recorded()[0]['options']['json']);
        self::assertSame(['name' => 'Renamed'], $fake->recorded()[1]['options']['json']);
    }

    // ─── Models > bare-array list response (README §Models) ────────

    #[Test]
    public function list_response_data_is_a_typed_list(): void
    {
        [$api, $fake] = SdkApi::fake([SdkConfig::url => 'https://api.example.com']);
        $fake->queue(new Response(200, [], json_encode([['id' => '01H1', 'name' => 'featured']]) ?: ''));

        $result = $api->listWidgetTags('01H');

        $names = [];
        foreach ($result->data as $tag) {
            $names[] = $tag->name; // 'featured'
        }

        self::assertSame(['featured'], $names);
        self::assertContainsOnlyInstancesOf(WidgetTag::class, $result->data);
    }

    // ─── Query parameters (README §Query parameters) ───────────────

    #[Test]
    public function query_parameters_are_appended_to_url(): void
    {
        [$api, $fake] = SdkApi::fake([SdkConfig::url => 'https://api.example.com']);
        $emptyWidgets = json_encode(['widgets' => [], 'Pagination' => null]) ?: '';
        $fake->queue(
            new Response(200, [], $emptyWidgets),
            new Response(200, [], $emptyWidgets),
            new Response(200, [], $emptyWidgets),
            new Response(200, [], $emptyWidgets),
            new Response(200, [], $emptyWidgets),
            new Response(200, [], json_encode(['id' => '01H']) ?: ''),
        );

        $api->listWidgets([Options::query => [Query::where => ['status', 'active']]]);
        $api->listWidgets([Options::query => [Query::where => ['name', 'LIKE', 'Sprocket%']]]);
        $api->listWidgets([Options::query => [Query::where => [['status', 'active'], ['name', 'Sprocket']]]]);
        $api->listWidgets([Options::query => [Query::per_page => 50, Query::with => ['owner', 'parts']]]);
        $api->listWidgets([Options::query => [Query::with => ['owner' => ['team']]]]);
        $api->getWidget('01H', [Options::query => [Query::fields => ['widgets' => ['id', 'name']]], 'timeout' => 5]);

        $urls = array_column($fake->recorded(), 'url');

        self::assertStringContainsString('where%5B0%5D%5B0%5D=status&where%5B0%5D%5B1%5D=active', $urls[0]);
        self::assertStringContainsString('where%5B0%5D%5B1%5D=LIKE', $urls[1]);
        self::assertStringContainsString('where%5B1%5D%5B0%5D=name', $urls[2]);
        self::assertStringContainsString('per_page=50', $urls[3]);
        self::assertStringContainsString('with=owner%2Cparts', $urls[3]);
        self::assertStringContainsString('with=owner.team', $urls[4]);
        self::assertStringContainsString('fields%5Bwidgets%5D=id%2Cname', $urls[5]);
        self::assertSame(5, $fake->recorded()[5]['options']['timeout']);
    }

    // ─── Query parameters > associative shorthand ──────────────────

    #[Test]
    public function query_where_associative_shorthand(): void
    {
        [$api, $fake] = SdkApi::fake([SdkConfig::url => 'https://api.example.com']);
        $fake->queue(new Response(200, [], json_encode(['widgets' => []]) ?: ''));

        $api->listWidgets([Options::query => [Query::where => ['status' => 'active']]]);

        self::assertStringContainsString('where%5Bstatus%5D=active', $fake->recorded()[0]['url']);
    }

    // ─── Published-model example (README §Publishing models) ───────
    // The README shows adding a `label()` method to a published Widget.
    // We can't declare a class in another namespace here, but we can prove
    // the properties that example relies on, and that its body is correct.

    #[Test]
    public function widget_exposes_properties_used_by_label_example(): void
    {
        $widget = Widget::from([
            Widget::id   => '01H',
            Widget::name => 'Sprocket',
        ]);

        self::assertSame('01H', $widget->id);
        self::assertSame('Sprocket', $widget->name);

        // Replicate the label() body from the example
        self::assertSame('Sprocket', $widget->name ?? ($widget->id ?? 'Unknown'));

        $unnamed = Widget::from([Widget::id => '01H']);
        self::assertSame('01H', $unnamed->name ?? ($unnamed->id ?? 'Unknown'));
    }

    // ─── Interoperability > Pagination fallback (README §Publishing models) ──

    #[Test]
    public function list_response_exposes_pagination(): void
    {
        [$api, $fake] = SdkApi::fake([SdkConfig::url => 'https://api.example.com']);
        $fake->queue(new Response(200, [], WidgetsResponseFactory::factory()->json() ?: ''));

        $result = $api->listWidgets();

        self::assertNotNull($result->data->Pagination);
        self::assertIsInt($result->data->Pagination->total);
    }
}
