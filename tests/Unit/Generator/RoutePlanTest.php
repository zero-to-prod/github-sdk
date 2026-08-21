<?php

namespace Unit\Generator;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\Sdk\Generator\RouteCase;
use Zerotoprod\Sdk\Generator\RouteOperation;
use Zerotoprod\Sdk\Generator\RoutePlan;

class RoutePlanTest extends TestCase
{
    #[Test]
    public function an_empty_plan_counts_nothing(): void
    {
        $plan = new RoutePlan();

        self::assertSame([], $plan->cases);
        self::assertSame(0, $plan->operationCount());
        self::assertSame([], $plan->modelClasses());
    }

    #[Test]
    public function it_totals_operations_across_cases(): void
    {
        $plan = new RoutePlan([
            new RouteCase('a', '/a', [new RouteOperation('GET', 'listA'), new RouteOperation('POST', 'createA')]),
            new RouteCase('b', '/b', [new RouteOperation('GET', 'listB')]),
        ]);

        self::assertSame(3, $plan->operationCount());
    }

    #[Test]
    public function model_classes_are_deduped_and_sorted(): void
    {
        $plan = new RoutePlan([
            new RouteCase('a', '/a', [
                new RouteOperation('POST', 'createA', request: 'Zeta', response: 'Alpha'),
                new RouteOperation('GET', 'listA', response: 'Alpha'),
                new RouteOperation('DELETE', 'deleteA'),
                new RouteOperation('GET', 'listATags', listOf: 'Beta'),
            ]),
        ]);

        self::assertSame(['Alpha', 'Beta', 'Zeta'], $plan->modelClasses());
    }
}
