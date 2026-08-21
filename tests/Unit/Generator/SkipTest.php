<?php

namespace Unit\Generator;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\Sdk\Generator\Skip;

class SkipTest extends TestCase
{
    #[Test]
    public function it_renders_kind_subject_and_reason(): void
    {
        $skip = new Skip(Skip::ENUM, 'mixed-enum', 'values are mixed-type');

        self::assertSame('enum', $skip->kind);
        self::assertSame('mixed-enum', $skip->subject);
        self::assertSame('values are mixed-type', $skip->reason);
        self::assertSame('[enum] mixed-enum — values are mixed-type', (string) $skip);
    }
}
