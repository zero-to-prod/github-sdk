<?php

namespace Unit\Generator;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\GitHubSdk\Generator\ApiRouteRenderer;
use Zerotoprod\GitHubSdk\Generator\RouteCase;
use Zerotoprod\GitHubSdk\Generator\RouteOperation;
use Zerotoprod\GitHubSdk\Generator\RoutePlan;

class ApiRouteRendererTest extends TestCase
{
    private function renderer(): ApiRouteRenderer
    {
        return new ApiRouteRenderer('Zerotoprod\\GitHubSdk', 'https://docs.github.com/');
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

        namespace Zerotoprod\GitHubSdk;

        use Zerotoprod\GitHubSdk\Internal\AdminApi;
        use Zerotoprod\GitHubSdk\Internal\HasRoute;
        use Zerotoprod\GitHubSdk\Internal\HttpMethod;
        use Zerotoprod\GitHubSdk\Internal\Route;
        use Zerotoprod\GitHubSdk\Models\CreateWidgetRequest;
        use Zerotoprod\GitHubSdk\Models\Widget;
        use Zerotoprod\GitHubSdk\Models\WidgetsResponse;

        /**
         * @method static Route widgets(array<string, mixed> $params = [])
         * @method static Route widget(array<string, mixed> $params = [])
         */
        enum ApiRoute: string
        {
            /**
             * Example collection route.
             * @link https://docs.github.com/
             */
            #[HasRoute]
            #[AdminApi(HttpMethod::GET, 'listWidgets', queryParams: ['per_page'], response: WidgetsResponse::class)]
            #[AdminApi(HttpMethod::POST, 'createWidget', request: CreateWidgetRequest::class, response: Widget::class)]
            case widgets = '/v1/widgets';

            /**
             * @link https://docs.github.com/
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
        self::assertStringContainsString('use Zerotoprod\GitHubSdk\Models\WidgetTag;', $out);
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

        self::assertStringContainsString("    /**\n     * @link https://docs.github.com/\n     */", $this->renderer()->render($plan));
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
