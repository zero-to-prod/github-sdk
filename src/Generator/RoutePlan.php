<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Generator;

/**
 * The whole `ApiRoute` enum, ready to render.
 *
 * @internal
 */
final class RoutePlan
{
    /** @param list<RouteCase> $cases */
    public function __construct(public readonly array $cases = []) {}

    public function operationCount(): int
    {
        return array_sum(array_map(
            static fn(RouteCase $case): int => count($case->operations),
            $this->cases,
        ));
    }

    /**
     * Every model class the rendered enum needs to import, sorted.
     *
     * @return list<string>
     */
    public function modelClasses(): array
    {
        $classes = [];

        foreach ($this->cases as $case) {
            foreach ($case->operations as $operation) {
                foreach ([$operation->request, $operation->response, $operation->listOf] as $class) {
                    if ($class !== null) {
                        $classes[$class] = true;
                    }
                }
            }
        }

        $names = array_keys($classes);
        sort($names);

        return $names;
    }
}
