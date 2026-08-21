<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Generator;

/**
 * Renders `src/ApiRoute.php`.
 *
 * This one file is a straight template render rather than a trip through the
 * data-model generator: it is an enum of route cases carrying attributes, which
 * the emitter has no vocabulary for. Everything it produces is already in house
 * style, so it skips the {@see Normalizer}.
 *
 * The `@method` block is generated too, because `./run check-routes` asserts it
 * matches the `#[HasRoute]` cases exactly.
 *
 * @internal
 */
final class ApiRouteRenderer
{
    public const INDENT = '    ';

    public function __construct(
        private readonly string $namespace,
        private readonly string $docsUrl,
    ) {}

    public function render(RoutePlan $plan): string
    {
        $imports = [
            "use $this->namespace\\Internal\\AdminApi;",
            "use $this->namespace\\Internal\\HasRoute;",
            "use $this->namespace\\Internal\\HttpMethod;",
            "use $this->namespace\\Internal\\Route;",
        ];

        foreach ($plan->modelClasses() as $class) {
            $imports[] = "use $this->namespace\\Models\\$class;";
        }

        sort($imports);

        // A document with no usable paths still needs a valid enum, so the
        // `@method` block and the case list are both omitted rather than
        // emitted empty.
        $methods = [];
        $body = [];

        if ($plan->cases !== []) {
            $methods = ['/**'];

            foreach ($plan->cases as $case) {
                $methods[] = " * @method static Route $case->name(array<string, mixed> \$params = [])";
            }

            $methods[] = ' */';

            foreach ($plan->cases as $case) {
                $body = [...$body, ...$this->renderCase($case), ''];
            }
        }

        return implode("\n", [
            '<?php',
            '',
            'declare(strict_types=1);',
            '',
            "namespace $this->namespace;",
            '',
            ...$imports,
            '',
            ...$methods,
            'enum ApiRoute: string',
            '{',
            ...$body,
            ...$this->callStatic(),
            '}',
        ]) . "\n";
    }

    /** @return list<string> */
    private function renderCase(RouteCase $case): array
    {
        $doc = ['/**'];

        foreach ($this->wrap($case->summary) as $line) {
            $doc[] = rtrim(" * $line");
        }

        foreach ($case->operations as $operation) {
            if ($operation->deprecated) {
                $doc[] = " * @deprecated $operation->name — the API marks this operation deprecated.";
            }
        }

        $doc[] = " * @link $this->docsUrl";
        $doc[] = ' */';

        $lines = [...$doc, '#[HasRoute]'];

        foreach ($case->operations as $operation) {
            $lines[] = $this->attribute($operation);
        }

        $lines[] = "case $case->name = " . var_export($case->path, true) . ';';

        return array_map(static fn(string $line): string => self::INDENT . $line, $lines);
    }

    private function attribute(RouteOperation $operation): string
    {
        $arguments = [
            "HttpMethod::$operation->httpMethod",
            var_export($operation->name, true),
        ];

        if ($operation->pathParams !== []) {
            $arguments[] = 'pathParams: ' . $this->stringList($operation->pathParams);
        }

        if ($operation->queryParams !== []) {
            $arguments[] = 'queryParams: ' . $this->stringList($operation->queryParams);
        }

        if ($operation->request !== null) {
            $arguments[] = "request: $operation->request::class";
        }

        if ($operation->response !== null) {
            $arguments[] = "response: $operation->response::class";
        }

        if ($operation->listOf !== null) {
            $arguments[] = "listOf: $operation->listOf::class";
        }

        return '#[AdminApi(' . implode(', ', $arguments) . ')]';
    }

    /** @param list<string> $values */
    private function stringList(array $values): string
    {
        return '[' . implode(', ', array_map(
            static fn(string $value): string => var_export($value, true),
            $values,
        )) . ']';
    }

    /**
     * The `__callStatic` shim every route enum carries, so `ApiRoute::widget()`
     * resolves a case into a `Route`.
     *
     * @return list<string>
     */
    private function callStatic(): array
    {
        return array_map(static fn(string $line): string => rtrim(self::INDENT . $line), [
            '/** @param  array<int, mixed>  $arguments */',
            'public static function __callStatic(string $name, array $arguments): Route',
            '{',
            '    /** @var self $case */',
            '    $case = constant(self::class . "::$name");',
            '',
            '    /** @var array<string, mixed> $params */',
            '    $params = $arguments[0] ?? [];',
            '',
            '    return Route::for($case, $params);',
            '}',
        ]);
    }

    /** @return list<string> */
    private function wrap(?string $summary): array
    {
        if ($summary === null) {
            return [];
        }

        $text = trim((string) preg_replace('/\s+/', ' ', str_replace('*/', '* /', $summary)));

        return $text === '' ? [] : explode("\n", wordwrap($text, Normalizer::WIDTH));
    }
}
