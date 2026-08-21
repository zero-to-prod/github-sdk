<?php

namespace Unit\Generator;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\GitHubSdk\Generator\GeneratorException;
use Zerotoprod\GitHubSdk\Generator\Normalizer;

class NormalizerTest extends TestCase
{
    /** The emitter writes one member per line with no indentation at all. */
    private const RAW_CLASS = <<<'PHP'
        <?php
        namespace Zerotoprod\GitHubSdk\Models;
        use Zerotoprod\DataModel\Describe;
        use Zerotoprod\GitHubSdk\Internal\DataModel;
        /**
         * Doc.
         * @link https://docs.github.com/
         */
        class Widget
        {
        use DataModel;
        /** @see $id */
        public const id = 'id';
        /** @see $tags */
        public const tags = 'tags';
        #[\Zerotoprod\DataModel\Describe(['nullable' => true])]
        public string|null $id;
        /** @var array<int, Tag> */
        #[\Zerotoprod\DataModel\Describe(['cast' => [\Zerotoprod\DataModelHelper\DataModelHelper::class, 'mapOf'], 'type' => Tag::class])]
        public array $tags;
        }
        PHP;

    #[Test]
    public function it_produces_the_house_style_end_to_end(): void
    {
        $expected = <<<'PHP'
        <?php

        declare(strict_types=1);

        namespace Zerotoprod\GitHubSdk\Models;

        use Zerotoprod\DataModel\Describe;
        use Zerotoprod\GitHubSdk\Internal\DataModel;

        /**
         * Doc.
         * @link https://docs.github.com/
         */
        class Widget
        {
            use DataModel;

            /** @see $id */
            public const id = 'id';
            #[Describe(['nullable' => true])]
            public ?string $id = null;

            /** @see $tags */
            public const tags = 'tags';
            /** @var array<int, Tag> */
            #[Describe([
                'cast' => [self::class, 'mapOf'],
                'type' => Tag::class,
                'default' => [],
            ])]
            public array $tags;
        }

        PHP;

        self::assertSame($expected, Normalizer::normalize(self::RAW_CLASS));
    }

    #[Test]
    public function it_injects_strict_types(): void
    {
        self::assertStringContainsString("<?php\n\ndeclare(strict_types=1);\n", Normalizer::normalize(self::RAW_CLASS));
    }

    #[Test]
    public function it_shortens_the_fully_qualified_describe_attribute(): void
    {
        $out = Normalizer::normalize(self::RAW_CLASS);

        self::assertStringContainsString('#[Describe(', $out);
        self::assertStringNotContainsString('\\Zerotoprod\\DataModel\\Describe(', $out);
    }

    #[Test]
    public function it_rewrites_the_helper_cast_to_a_self_reference(): void
    {
        $out = Normalizer::normalize(self::RAW_CLASS);

        self::assertStringContainsString("'cast' => [self::class, 'mapOf'],", $out);
        self::assertStringNotContainsString('DataModelHelper', $out);
    }

    #[Test]
    public function it_collapses_a_nullable_union_to_the_question_mark_form(): void
    {
        self::assertStringContainsString('public ?string $id = null;', Normalizer::normalize(self::RAW_CLASS));
    }

    #[Test]
    public function a_real_union_keeps_an_explicit_null_member(): void
    {
        $out = Normalizer::normalize(self::raw('public string|int|null $x;'));

        self::assertStringContainsString('public string|int|null $x = null;', $out);
    }

    #[Test]
    public function mixed_is_never_marked_nullable_because_php_rejects_it(): void
    {
        $out = Normalizer::normalize(self::raw('public mixed|null $x;'));

        self::assertStringContainsString('public mixed $x = null;', $out);
        self::assertStringNotContainsString('?mixed', $out);
    }

    #[Test]
    public function a_non_nullable_scalar_gets_no_default(): void
    {
        self::assertStringContainsString('public string $x;', Normalizer::normalize(self::raw('public string $x;')));
    }

    #[Test]
    public function an_existing_default_is_preserved(): void
    {
        self::assertStringContainsString(
            "public string \$x = 'given';",
            Normalizer::normalize(self::raw("public string \$x = 'given';")),
        );
    }

    #[Test]
    public function an_array_property_with_no_attribute_gains_one(): void
    {
        self::assertStringContainsString(
            "#[Describe(['default' => []])]\n    public array \$x;",
            Normalizer::normalize(self::raw('public array $x;')),
        );
    }

    #[Test]
    public function an_array_property_with_an_attribute_gains_the_default_entry(): void
    {
        self::assertStringContainsString(
            "    #[Describe([\n        'from' => self::x,\n        'default' => [],\n    ])]\n    public array \$x;",
            Normalizer::normalize(self::raw(
                "#[\\Zerotoprod\\DataModel\\Describe(['from' => self::x])]\npublic array \$x;",
            )),
        );
    }

    #[Test]
    public function an_array_property_that_already_declares_a_default_is_left_alone(): void
    {
        $out = Normalizer::normalize(self::raw(
            "#[\\Zerotoprod\\DataModel\\Describe(['default' => ['a']])]\npublic array \$x;",
        ));

        self::assertStringContainsString("#[Describe(['default' => ['a']])]", $out);
        self::assertSame(1, substr_count($out, "'default'"));
    }

    #[Test]
    public function a_readonly_array_property_keeps_its_modifier_and_gains_no_default(): void
    {
        $out = Normalizer::normalize(self::raw('public readonly array $x;'));

        self::assertStringContainsString('public readonly array $x;', $out);
        self::assertStringNotContainsString('default', $out);
    }

    #[Test]
    public function a_single_entry_describe_stays_on_one_line(): void
    {
        self::assertStringContainsString(
            "#[Describe(['nullable' => true])]",
            Normalizer::normalize(self::RAW_CLASS),
        );
    }

    #[Test]
    public function a_non_describe_attribute_passes_through_indented(): void
    {
        self::assertStringContainsString(
            "    #[Deprecated]\n    public ?string \$x = null;",
            Normalizer::normalize(self::raw("#[Deprecated]\npublic string|null \$x;")),
        );
    }

    #[Test]
    public function a_constant_with_no_matching_property_is_still_emitted(): void
    {
        $out = Normalizer::normalize(<<<'PHP'
        <?php
        namespace N;
        class C
        {
        /** @see $orphan */
        public const orphan = 'orphan';
        }
        PHP);

        self::assertStringContainsString("    /** @see \$orphan */\n    public const orphan = 'orphan';", $out);
    }

    #[Test]
    public function a_typed_constant_is_recognised(): void
    {
        $out = Normalizer::normalize(<<<'PHP'
        <?php
        namespace N;
        class C
        {
        public const string NAME = 'n';
        }
        PHP);

        self::assertStringContainsString("    public const string NAME = 'n';", $out);
    }

    #[Test]
    public function an_enum_keeps_its_cases_adjacent_with_no_blank_lines(): void
    {
        $out = Normalizer::normalize(<<<'PHP'
        <?php
        namespace Zerotoprod\GitHubSdk\Models;
        /**
         * Status.
         * @link https://docs.github.com/
         */
        enum WidgetStatus: string
        {
        case unknown = 'unknown';
        case active = 'active';
        }
        PHP);

        self::assertSame(<<<'PHP'
        <?php

        declare(strict_types=1);

        namespace Zerotoprod\GitHubSdk\Models;

        /**
         * Status.
         * @link https://docs.github.com/
         */
        enum WidgetStatus: string
        {
            case unknown = 'unknown';
            case active = 'active';
        }

        PHP, $out);
    }

    #[Test]
    public function a_readonly_class_declaration_is_recognised(): void
    {
        $out = Normalizer::normalize(<<<'PHP'
        <?php
        namespace N;
        readonly class C
        {
        public string $x;
        }
        PHP);

        self::assertStringContainsString('readonly class C', $out);
    }

    #[Test]
    public function a_file_with_no_namespace_or_imports_still_normalizes(): void
    {
        $out = Normalizer::normalize("<?php\nclass C\n{\n}");

        self::assertSame("<?php\n\ndeclare(strict_types=1);\n\nclass C\n{\n}\n", $out);
    }

    #[Test]
    public function imports_are_sorted(): void
    {
        $out = Normalizer::normalize(<<<'PHP'
        <?php
        namespace N;
        use Zed;
        use Alpha;
        class C
        {
        }
        PHP);

        self::assertStringContainsString("use Alpha;\nuse Zed;\n", $out);
    }

    #[Test]
    public function a_quoted_comma_inside_a_describe_entry_does_not_split_it(): void
    {
        $out = Normalizer::normalize(self::raw(
            "#[\\Zerotoprod\\DataModel\\Describe(['from' => 'a,b', 'nullable' => true])]\npublic string|null \$x;",
        ));

        self::assertStringContainsString("        'from' => 'a,b',\n        'nullable' => true,\n", $out);
    }

    #[Test]
    public function an_escaped_quote_inside_a_describe_entry_survives(): void
    {
        $out = Normalizer::normalize(self::raw(
            "#[\\Zerotoprod\\DataModel\\Describe(['from' => 'a\\'b', 'nullable' => true])]\npublic string|null \$x;",
        ));

        self::assertStringContainsString("'from' => 'a\\'b',", $out);
    }

    #[Test]
    public function blank_lines_in_the_body_are_discarded(): void
    {
        $out = Normalizer::normalize("<?php\nclass C\n{\n\npublic string \$x;\n\n}");

        self::assertSame("<?php\n\ndeclare(strict_types=1);\n\nclass C\n{\n    public string \$x;\n}\n", $out);
    }

    #[Test]
    public function a_leading_non_describe_attribute_does_not_stop_the_array_default(): void
    {
        $out = Normalizer::normalize(self::raw(
            "#[Deprecated]\n#[\\Zerotoprod\\DataModel\\Describe(['from' => self::x])]\npublic array \$x;",
        ));

        self::assertStringContainsString("    #[Deprecated]\n", $out);
        self::assertStringContainsString("'default' => [],", $out);
    }

    #[Test]
    public function a_file_that_does_not_start_with_php_is_refused(): void
    {
        $this->expectException(GeneratorException::class);
        $this->expectExceptionMessage('does not begin with `<?php`');

        Normalizer::normalize("echo 'nope';");
    }

    #[Test]
    public function a_file_declaring_neither_class_nor_enum_is_refused(): void
    {
        $this->expectException(GeneratorException::class);
        $this->expectExceptionMessage('declares neither a class nor an enum');

        Normalizer::normalize("<?php\nnamespace N;\n");
    }

    #[Test]
    public function an_unparsable_property_line_is_refused(): void
    {
        $this->expectException(GeneratorException::class);
        $this->expectExceptionMessage('Cannot parse emitted property');

        // Reads as a property but does not end at the semicolon, so the
        // re-render cannot take it apart.
        Normalizer::normalize("<?php\nclass C\n{\npublic string \$x; // trailing note\n}");
    }

    /** Wrap member lines in the emitter's minimal class skeleton. */
    private static function raw(string $members): string
    {
        return "<?php\nnamespace N;\nclass C\n{\n$members\n}";
    }
}
