<?php

namespace Unit\Generator;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\Sdk\Generator\ApiRouteRenderer;
use Zerotoprod\Sdk\Generator\RouteCase;
use Zerotoprod\Sdk\Generator\RouteOperation;
use Zerotoprod\Sdk\Generator\RoutePlan;

class ApiRouteRendererTest extends TestCase
{
    private function renderer(): ApiRouteRenderer
    {
        return new ApiRouteRenderer('Zerotoprod\\Sdk', 'https://example.com/docs');
    }

    #[Test]
    public function it_renders_the_whole_enum_in_house_style(): void
    {
        $plan = new RoutePlan([
            new RouteCase('widgets', '/v1/widgets', [
                new RouteOperation('GET', 'listWidgets', [], ['per_page'], response: 'WidgetsResponse'),
                new RouteOperation('POST', 'createWidget', request: 'CreateWidgetRequest', response: 'Widget'),
            ], 'Example collection route.'),
            new RouteCase('widget', '/v1/widgets/{id}', [
                new RouteOperation('DELETE', 'deleteWidget', ['id']),
            ]),
        ]);

        $expected = <<<'PHP'
        <?php

        declare(strict_types=1);

        namespace Zerotoprod\Sdk;

        use Zerotoprod\Sdk\Internal\AdminApi;
        use Zerotoprod\Sdk\Internal\HasRoute;
        use Zerotoprod\Sdk\Internal\HttpMethod;
        use Zerotoprod\Sdk\Internal\Route;
        use Zerotoprod\Sdk\Models\CreateWidgetRequest;
        use Zerotoprod\Sdk\Models\Widget;
        use Zerotoprod\Sdk\Models\WidgetsResponse;

        /**
         * @method static Route widgets(array<string, mixed> $params = [])
         * @method static Route widget(array<string, mixed> $params = [])
         */
        enum ApiRoute: string
        {
            /**
             * Example collection route.
             * @link https://example.com/docs
             */
            #[HasRoute]
            #[AdminApi(HttpMethod::GET, 'listWidgets', queryParams: ['per_page'], response: WidgetsResponse::class)]
            #[AdminApi(HttpMethod::POST, 'createWidget', request: CreateWidgetRequest::class, response: Widget::class)]
            case widgets = '/v1/widgets';

            /**
             * @link https://example.com/docs
             */
            #[HasRoute]
            #[AdminApi(HttpMethod::DELETE, 'deleteWidget', pathParams: ['id'])]
            case widget = '/v1/widgets/{id}';

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

        PHP;

        self::assertSame($expected, $this->renderer()->render($plan));
    }

    #[Test]
    public function a_list_response_renders_a_list_of_argument(): void
    {
        $plan = new RoutePlan([
            new RouteCase('widgetTags', '/v1/widgets/{id}/tags', [
                new RouteOperation('GET', 'listWidgetTags', ['id'], listOf: 'WidgetTag'),
            ]),
        ]);

        $out = $this->renderer()->render($plan);

        self::assertStringContainsString(
            "#[AdminApi(HttpMethod::GET, 'listWidgetTags', pathParams: ['id'], listOf: WidgetTag::class)]",
            $out,
        );
        self::assertStringContainsString('use Zerotoprod\Sdk\Models\WidgetTag;', $out);
    }

    #[Test]
    public function a_deprecated_operation_adds_a_deprecated_tag(): void
    {
        $plan = new RoutePlan([
            new RouteCase('widget', '/v1/widgets/{id}', [
                new RouteOperation('GET', 'getWidget', ['id'], deprecated: true),
            ]),
        ]);

        self::assertStringContainsString(
            ' * @deprecated getWidget — the API marks this operation deprecated.',
            $this->renderer()->render($plan),
        );
    }

    #[Test]
    public function an_empty_plan_still_renders_a_valid_enum(): void
    {
        $out = $this->renderer()->render(new RoutePlan());

        self::assertStringContainsString("enum ApiRoute: string\n{\n    /** @param", $out);
        self::assertStringNotContainsString('@method', $out);
        self::assertStringNotContainsString("/**\n */", $out);
    }

    #[Test]
    public function a_long_summary_is_wrapped(): void
    {
        $plan = new RoutePlan([
            new RouteCase('widget', '/v1/widgets/{id}', [new RouteOperation('GET', 'getWidget', ['id'])], str_repeat('word ', 40)),
        ]);

        foreach (explode("\n", $this->renderer()->render($plan)) as $line) {
            self::assertLessThanOrEqual(120, strlen($line));
        }
    }

    #[Test]
    public function a_summary_cannot_close_the_docblock_early(): void
    {
        $plan = new RoutePlan([
            new RouteCase('widget', '/v1/w', [new RouteOperation('GET', 'getWidget')], 'ends the block */ then code'),
        ]);

        $out = $this->renderer()->render($plan);

        self::assertStringContainsString('ends the block * / then code', $out);
    }

    #[Test]
    public function a_blank_summary_produces_no_description_line(): void
    {
        $plan = new RoutePlan([
            new RouteCase('widget', '/v1/w', [new RouteOperation('GET', 'getWidget')], '   '),
        ]);

        self::assertStringContainsString("    /**\n     * @link https://example.com/docs\n     */", $this->renderer()->render($plan));
    }

    #[Test]
    public function the_namespace_comes_from_the_manifest(): void
    {
        $renderer = new ApiRouteRenderer('Acme\\Api', 'https://acme.test/docs');
        $plan = new RoutePlan([
            new RouteCase('widget', '/v1/w', [new RouteOperation('GET', 'getWidget', response: 'Widget')]),
        ]);

        $out = $renderer->render($plan);

        self::assertStringContainsString('namespace Acme\\Api;', $out);
        self::assertStringContainsString('use Acme\\Api\\Internal\\AdminApi;', $out);
        self::assertStringContainsString('use Acme\\Api\\Models\\Widget;', $out);
        self::assertStringContainsString('@link https://acme.test/docs', $out);
    }
}
