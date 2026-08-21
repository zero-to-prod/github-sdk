<?php

namespace Unit\Generator;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\GitHubSdk\Generator\TypeSpec;

class TypeSpecTest extends TestCase
{
    #[Test]
    public function of_builds_a_bare_scalar(): void
    {
        $spec = TypeSpec::of('string');

        self::assertSame(['string'], $spec->types);
        self::assertFalse($spec->nullable);
        self::assertSame([], $spec->describe);
        self::assertNull($spec->docType);
        self::assertNull($spec->className);
        self::assertFalse($spec->isEnum);
        self::assertFalse($spec->hasUnknown);
    }

    #[Test]
    public function as_nullable_preserves_every_other_field(): void
    {
        $spec = new TypeSpec(['Widget'], false, ['cast' => 'x'], 'array<int, Widget>', 'Widget', true, true);
        $nullable = $spec->asNullable();

        self::assertTrue($nullable->nullable);
        self::assertSame(['Widget'], $nullable->types);
        self::assertSame(['cast' => 'x'], $nullable->describe);
        self::assertSame('array<int, Widget>', $nullable->docType);
        self::assertSame('Widget', $nullable->className);
        self::assertTrue($nullable->isEnum);
        self::assertTrue($nullable->hasUnknown);
    }

    #[Test]
    public function as_nullable_returns_the_same_instance_when_already_nullable(): void
    {
        $spec = TypeSpec::of('string', true);

        self::assertSame($spec, $spec->asNullable());
    }

    #[Test]
    public function is_array_matches_only_a_bare_array(): void
    {
        self::assertTrue(TypeSpec::of('array')->isArray());
        self::assertFalse(TypeSpec::of('string')->isArray());
        self::assertFalse((new TypeSpec(['array', 'string']))->isArray());
    }
}
