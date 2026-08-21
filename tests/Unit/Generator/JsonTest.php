<?php

namespace Unit\Generator;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\GitHubSdk\Generator\Json;

class JsonTest extends TestCase
{
    #[Test]
    public function map_passes_through_an_object(): void
    {
        self::assertSame(['a' => 1], Json::map(['a' => 1]));
    }

    #[Test]
    public function map_turns_anything_else_into_an_empty_map(): void
    {
        self::assertSame([], Json::map(null));
        self::assertSame([], Json::map('string'));
        self::assertSame([], Json::map(7));
    }

    #[Test]
    public function list_of_reindexes_and_drops_keys(): void
    {
        self::assertSame(['a', 'b'], Json::listOf(['x' => 'a', 'y' => 'b']));
        self::assertSame([], Json::listOf(null));
    }

    #[Test]
    public function str_returns_non_empty_strings_only(): void
    {
        self::assertSame('a', Json::str('a'));
        self::assertNull(Json::str(''));
        self::assertNull(Json::str(null));
        self::assertNull(Json::str(5));
    }

    #[Test]
    public function strings_drops_non_string_members(): void
    {
        self::assertSame(['a', 'b'], Json::strings(['a', 1, 'b', null, []]));
        self::assertSame([], Json::strings('not a list'));
    }

    #[Test]
    public function is_true_accepts_the_boolean_and_the_string(): void
    {
        self::assertTrue(Json::isTrue(true));
        self::assertTrue(Json::isTrue('true'));
        self::assertFalse(Json::isTrue(false));
        self::assertFalse(Json::isTrue(1));
        self::assertFalse(Json::isTrue(null));
    }
}
