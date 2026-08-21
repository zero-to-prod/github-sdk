<?php

namespace Unit\Generator;

use PHPUnit\Framework\Attributes\Test;
use Tests\Unit\Generator\GeneratorCase;
use Zerotoprod\GitHubSdk\Generator\GeneratorException;
use Zerotoprod\GitHubSdk\Generator\GeneratorResult;

class SchemaMapperTest extends GeneratorCase
{
    /**
     * These fixtures declare schemas and no paths on purpose: this suite is
     * about what one schema becomes, not about what a route can reach. So it
     * runs with reachability pruning off — see SchemaMapperTest's sibling
     * GeneratorTest for the pruning behaviour itself.
     */
    protected function generate(
        string $fixture,
        bool $webhooks = false,
        bool $models = true,
        bool $routes = true,
        bool $prune = false,
    ): GeneratorResult {
        return parent::generate($fixture, $webhooks, $models, $routes, $prune);
    }

    // ─── allOf ─────────────────────────────────────────────────────────

    #[Test]
    public function all_ref_members_merge_into_one_flat_class(): void
    {
        $this->generate('allof');

        $source = $this->model('RefsOnly');

        self::assertStringContainsString('public const id = ', $source);
        self::assertStringContainsString('public const name = ', $source);
        self::assertStringContainsString('public const created_at = ', $source);
        self::assertStringContainsString('Composed purely from refs.', $source);
    }

    #[Test]
    public function a_mixed_allof_merges_ref_members_with_an_inline_object(): void
    {
        $this->generate('allof');

        $source = $this->model('MixedAllof');

        self::assertStringContainsString('public const id = ', $source);
        self::assertStringContainsString('public const extra = ', $source);
    }

    #[Test]
    public function the_most_specific_member_wins_a_property_type(): void
    {
        $this->generate('allof');

        // `base` types `name` as a string; the inline member re-types it as an
        // integer and is layered last.
        self::assertStringContainsString('public ?int $name = null;', $this->model('MixedAllof'));
    }

    #[Test]
    public function a_schemas_own_properties_are_layered_over_its_allof(): void
    {
        $this->generate('allof');

        $source = $this->model('OwnProps');

        self::assertStringContainsString('public const id = ', $source);
        self::assertStringContainsString('public const own = ', $source);
    }

    #[Test]
    public function a_single_member_allof_reuses_the_target_class(): void
    {
        $result = $this->generate('allof');

        self::assertNotContains('SingleRefWrapper', $this->models());
        self::assertContains(
            '[schema] single-ref-wrapper — single-member allOf around `base` — reuses that class',
            self::reasons($result),
        );
    }

    #[Test]
    public function a_nullable_allof_wrapper_becomes_a_nullable_property_of_the_target(): void
    {
        $this->generate('allof');

        self::assertStringContainsString('public ?Base $wrapped = null;', $this->model('Holder'));
    }

    #[Test]
    public function an_inline_allof_is_promoted_to_its_own_merged_class(): void
    {
        $this->generate('allof');

        $source = $this->model('HolderInline');

        self::assertStringContainsString('public const id = ', $source);
        self::assertStringContainsString('public const n = ', $source);
    }

    #[Test]
    public function an_inline_single_ref_allof_wrapper_reuses_the_target_class(): void
    {
        $this->generate('allof');

        $source = $this->model('Holder');

        self::assertStringContainsString('public ?Base $inline_wrapper = null;', $source);
        self::assertStringContainsString('public ?Base $inline_wrapper_not_null = null;', $source);
        self::assertNotContains('HolderInlineWrapper', $this->models());
    }

    #[Test]
    public function a_cyclic_allof_fails_loudly_rather_than_recursing(): void
    {
        $this->expectException(GeneratorException::class);
        $this->expectExceptionMessage('cyclic allOf');

        $this->generate('allof-cycle');
    }

    // ─── oneOf / anyOf ─────────────────────────────────────────────────

    #[Test]
    public function all_scalar_members_become_a_php_union(): void
    {
        $this->generate('unions');

        self::assertStringContainsString('public string|int|null $scalars = null;', $this->model('Unions'));
    }

    #[Test]
    public function an_anyof_with_a_null_member_is_nullable(): void
    {
        $this->generate('unions');

        self::assertStringContainsString('public ?string $any_nullable = null;', $this->model('Unions'));
    }

    #[Test]
    public function a_single_object_member_collapses_to_that_class(): void
    {
        $this->generate('unions');

        $source = $this->model('Unions');

        self::assertStringContainsString('public ?Alpha $one_object = null;', $source);
        self::assertStringContainsString('public ?Alpha $one_object_or_null = null;', $source);
    }

    #[Test]
    public function two_object_members_widen_to_a_free_form_map_and_are_reported(): void
    {
        $result = $this->generate('unions');

        self::assertStringContainsString('public array $two_objects;', $this->model('Unions'));
        self::assertStringContainsString(
            'oneOf mixes 2 object schema(s) with 0 scalar type(s)',
            implode("\n", self::reasons($result)),
        );
    }

    #[Test]
    public function mixing_an_object_with_a_scalar_widens_too(): void
    {
        $result = $this->generate('unions');

        self::assertStringContainsString('public array $object_or_scalar;', $this->model('Unions'));
        self::assertStringContainsString(
            'oneOf mixes 1 object schema(s) with 1 scalar type(s)',
            implode("\n", self::reasons($result)),
        );
    }

    #[Test]
    public function an_empty_member_widens_the_union_to_mixed(): void
    {
        $this->generate('unions');

        self::assertStringContainsString('public mixed $empty_member = null;', $this->model('Unions'));
    }

    #[Test]
    public function a_union_of_nothing_but_null_is_mixed(): void
    {
        $this->generate('unions');

        self::assertStringContainsString('public mixed $no_members_but_key = null;', $this->model('Unions'));
    }

    #[Test]
    public function a_top_level_union_schema_emits_no_class(): void
    {
        $result = $this->generate('unions');

        self::assertNotContains('TopLevelUnion', $this->models());
        self::assertStringContainsString(
            '[schema] top-level-union — not an object schema',
            implode("\n", self::reasons($result)),
        );
    }

    // ─── Nullability ───────────────────────────────────────────────────

    #[Test]
    public function it_understands_both_the_30_and_31_nullable_spellings(): void
    {
        $this->generate('nullable');

        $source = $this->model('Spellings');

        self::assertStringContainsString('public ?string $v30 = null;', $source);
        self::assertStringContainsString('public ?string $v31 = null;', $source);
        self::assertStringContainsString('public string|int|null $v31_multi = null;', $source);
    }

    #[Test]
    public function a_nullable_schema_with_a_twin_reuses_the_twins_class(): void
    {
        $result = $this->generate('nullable');

        self::assertNotContains('NullableSimpleUser', $this->models());
        self::assertStringContainsString('public ?SimpleUser $twin = null;', $this->model('Spellings'));
        self::assertStringContainsString(
            'nullable twin of `simple-user` — reuses that class',
            implode("\n", self::reasons($result)),
        );
    }

    #[Test]
    public function a_nullable_schema_with_no_twin_gets_its_own_class(): void
    {
        // 8 of the GitHub spec's 28 `nullable-*` schemas have no twin; stripping
        // the prefix blindly would lose them.
        $this->generate('nullable');

        self::assertContains('NullableOrphan', $this->models());
        self::assertContains('NullableUnderscoreOrphan', $this->models());
        self::assertStringContainsString('public ?NullableOrphan $orphan = null;', $this->model('Spellings'));
        self::assertStringContainsString(
            'public ?NullableUnderscoreOrphan $underscore_orphan = null;',
            $this->model('Spellings'),
        );
    }

    // ─── Enums ─────────────────────────────────────────────────────────

    #[Test]
    public function a_string_enum_gains_a_leading_unknown_case(): void
    {
        $this->generate('enums');

        $source = $this->model('HolderRequiredEnum');

        self::assertStringContainsString("enum HolderRequiredEnum: string", $source);
        self::assertStringContainsString("case unknown = 'unknown';\n    case open = 'open';", $source);
    }

    #[Test]
    public function every_awkward_enum_value_becomes_a_case_keeping_its_raw_backing_value(): void
    {
        $this->generate('enums');

        $source = $this->model('Sanitized');

        foreach ([
            "case asterisk = '*';",
            "case minus_1 = '-1';",
            "case plus_1 = '+1';",
            "case slash = '/';",
            "case docs = '/docs';",
            "case _040000 = '040000';",
            "case _100644 = '100644';",
            "case _2fa_disabled = '2fa_disabled';",
            "case author_date = 'author-date';",
            "case deleted_ruleset = 'deleted ruleset';",
            "case master_docs = 'master /docs';",
            "case reactions_plus_1 = 'reactions-+1';",
            "case reactions_minus_1 = 'reactions--1';",
            "case won_t_fix = 'won\\'t fix';",
            "case empty = '';",
            "case class_ = 'class';",
            "case default = 'default';",
        ] as $expected) {
            self::assertStringContainsString($expected, $source);
        }
    }

    #[Test]
    public function an_existing_unknown_value_is_not_duplicated(): void
    {
        $this->generate('enums');

        self::assertSame(1, substr_count($this->model('Sanitized'), "case unknown = 'unknown';"));
    }

    #[Test]
    public function an_integer_enum_is_int_backed_and_has_no_unknown_case(): void
    {
        $this->generate('enums');

        $source = $this->model('IntEnum');

        self::assertStringContainsString('enum IntEnum: int', $source);
        self::assertStringContainsString('case _1 = 1;', $source);
        self::assertStringNotContainsString('unknown', $source);
    }

    #[Test]
    public function a_mixed_type_enum_cannot_be_a_backed_enum_and_is_reported(): void
    {
        $result = $this->generate('enums');

        self::assertNotContains('MixedEnum', $this->models());
        self::assertStringContainsString(
            '[enum] mixed-enum — enum values are mixed-type (string, int, bool)',
            implode("\n", self::reasons($result)),
        );
    }

    #[Test]
    public function a_boolean_only_enum_degrades_to_bool(): void
    {
        $result = $this->generate('enums');

        self::assertNotContains('BooleanEnum', $this->models());
        self::assertStringContainsString(
            '[enum] boolean-enum — enum values are bool (bool)',
            implode("\n", self::reasons($result)),
        );
    }

    #[Test]
    public function a_float_enum_degrades_to_float(): void
    {
        $result = $this->generate('enums');

        self::assertStringContainsString(
            '[enum] float-enum — enum values are float (float)',
            implode("\n", self::reasons($result)),
        );
    }

    #[Test]
    public function an_enum_of_objects_degrades_to_mixed(): void
    {
        $result = $this->generate('enums');

        self::assertStringContainsString(
            '[enum] object-enum — enum values are array (array)',
            implode("\n", self::reasons($result)),
        );
    }

    #[Test]
    public function an_enum_of_only_null_falls_back_to_the_declared_type(): void
    {
        $result = $this->generate('enums');

        self::assertStringContainsString(
            '[enum] null-only-enum — enum lists no values other than null',
            implode("\n", self::reasons($result)),
        );
    }

    #[Test]
    public function a_null_member_makes_the_enum_nullable_without_becoming_a_case(): void
    {
        $this->generate('enums');

        $source = $this->model('NullableMemberEnum');

        self::assertStringContainsString("case a = 'a';", $source);
        self::assertStringNotContainsString('null', $source);
    }

    #[Test]
    public function a_required_string_enum_defaults_to_unknown_instead_of_being_nullable(): void
    {
        $this->generate('enums');

        self::assertStringContainsString(
            "#[Describe(['default' => HolderRequiredEnum::unknown])]\n    public HolderRequiredEnum \$required_enum;",
            $this->model('Holder'),
        );
    }

    #[Test]
    public function an_optional_enum_is_nullable(): void
    {
        $this->generate('enums');

        self::assertStringContainsString('public ?HolderRequiredEnum $optional_enum = null;', $this->model('Holder'));
    }

    #[Test]
    public function a_required_but_nullable_enum_stays_nullable(): void
    {
        $this->generate('enums');

        self::assertStringContainsString(
            'public ?HolderNullableRequiredEnum $nullable_required_enum = null;',
            $this->model('Holder'),
        );
    }

    #[Test]
    public function identical_inline_enums_share_one_class(): void
    {
        $result = $this->generate('enums');

        // `optional_enum` and `duplicate_enum` declare the same values as
        // `required_enum`; emitting three identical enums would be waste.
        $source = $this->model('Holder');

        self::assertStringContainsString('public ?HolderRequiredEnum $duplicate_enum = null;', $source);
        self::assertNotContains('HolderOptionalEnum', $this->models());
        self::assertNotContains('HolderDuplicateEnum', $this->models());
        self::assertSame(2, $result->reusedEnums);
    }

    #[Test]
    public function a_different_value_set_gets_its_own_enum(): void
    {
        $this->generate('enums');

        self::assertContains('HolderDifferentEnum', $this->models());
    }

    #[Test]
    public function a_list_of_enums_hydrates_with_try_from_so_a_stray_value_is_null(): void
    {
        $this->generate('enums');

        $source = $this->model('Holder');

        self::assertStringContainsString('/** @var array<int, HolderEnumListItem|null> */', $source);
        self::assertStringContainsString("'method' => 'tryFrom',", $source);
    }

    // ─── Arrays and maps ───────────────────────────────────────────────

    #[Test]
    public function a_list_of_refs_gets_the_map_of_cast(): void
    {
        $this->generate('arrays');

        self::assertStringContainsString(
            "/** @var array<int, Leaf> */\n"
            . "    #[Describe([\n"
            . "        'cast' => [self::class, 'mapOf'],\n"
            . "        'type' => Leaf::class,\n"
            . "        'default' => [],\n"
            . "    ])]\n"
            . '    public array $of_ref;',
            $this->model('Shapes'),
        );
    }

    #[Test]
    public function a_list_of_scalars_gets_a_var_docblock_and_no_cast(): void
    {
        $this->generate('arrays');

        self::assertStringContainsString(
            "/** @var array<int, int> */\n    #[Describe(['default' => []])]\n    public array \$of_scalar;",
            $this->model('Shapes'),
        );
    }

    #[Test]
    public function a_list_with_no_items_is_a_list_of_mixed(): void
    {
        $this->generate('arrays');

        self::assertStringContainsString('/** @var array<int, mixed> */', $this->model('Shapes'));
    }

    #[Test]
    public function a_nested_list_documents_both_dimensions(): void
    {
        $this->generate('arrays');

        self::assertStringContainsString('/** @var array<int, array<int, string>> */', $this->model('Shapes'));
    }

    #[Test]
    public function additional_properties_becomes_a_free_form_string_keyed_map(): void
    {
        $this->generate('arrays');

        $source = $this->model('Shapes');

        self::assertStringContainsString("/** @var array<string, mixed> */\n"
            . "    #[Describe(['default' => []])]\n    public array \$free_form;", $source);
        self::assertStringContainsString('public array $bare_additional;', $source);
    }

    #[Test]
    public function a_typed_additional_properties_documents_its_value_type(): void
    {
        $this->generate('arrays');

        self::assertStringContainsString('/** @var array<string, string> */', $this->model('Shapes'));
    }

    #[Test]
    public function a_map_of_models_is_reported_as_unhydrated(): void
    {
        $result = $this->generate('arrays');

        self::assertStringContainsString('/** @var array<string, Leaf> */', $this->model('Shapes'));
        self::assertStringContainsString(
            'additionalProperties names `Leaf` — kept as a string-keyed array, values not hydrated',
            implode("\n", self::reasons($result)),
        );
    }

    #[Test]
    public function an_object_with_neither_properties_nor_additional_properties_is_a_map(): void
    {
        $this->generate('arrays');

        self::assertStringContainsString('public array $empty_object;', $this->model('Shapes'));
    }

    #[Test]
    public function an_untyped_or_unknown_type_property_is_mixed(): void
    {
        $this->generate('arrays');

        $source = $this->model('Shapes');

        self::assertStringContainsString('public mixed $untyped = null;', $source);
        self::assertStringContainsString('public mixed $unknown_type = null;', $source);
    }

    #[Test]
    public function a_number_becomes_a_float(): void
    {
        $this->generate('arrays');

        self::assertStringContainsString('public ?float $number = null;', $this->model('Shapes'));
    }

    #[Test]
    public function a_top_level_array_or_scalar_schema_emits_no_class(): void
    {
        $result = $this->generate('arrays');
        $reasons = implode("\n", self::reasons($result));

        self::assertNotContains('TopLevelArray', $this->models());
        self::assertNotContains('TopLevelScalar', $this->models());
        self::assertStringContainsString('[schema] top-level-array — not an object schema — mapped to `array`', $reasons);
        self::assertStringContainsString('[schema] top-level-scalar — not an object schema — mapped to `string`', $reasons);
    }

    // ─── Formats and inline promotion ──────────────────────────────────

    #[Test]
    public function a_date_time_format_stays_a_nullable_string(): void
    {
        $this->generate('widgets');

        self::assertStringContainsString('public ?string $created_at = null;', $this->model('Widget'));
    }

    #[Test]
    public function an_inline_object_property_is_promoted_to_parent_plus_property(): void
    {
        $this->generate('widgets');

        self::assertContains('WidgetOwner', $this->models());
        self::assertStringContainsString('public ?WidgetOwner $owner = null;', $this->model('Widget'));
    }

    #[Test]
    public function a_property_name_that_is_not_an_identifier_carries_a_from_mapping(): void
    {
        $this->generate('widgets');

        self::assertStringContainsString(
            "/** @see \$_2fa */\n    public const _2fa = '2fa';\n"
            . "    #[Describe([\n        'from' => self::_2fa,\n        'nullable' => true,\n    ])]\n"
            . '    public ?bool $_2fa = null;',
            $this->model('Widget'),
        );
    }

    #[Test]
    public function two_wire_keys_that_sanitise_alike_stay_distinct_members(): void
    {
        $this->generate('collisions');

        $source = $this->model('MemberCollisions');

        self::assertStringContainsString("public const foo_bar = 'foo-bar';", $source);
        self::assertStringContainsString("public const foo_bar2 = 'foo_bar';", $source);
        self::assertStringContainsString("'from' => self::foo_bar2,", $source);
    }

    #[Test]
    public function reserved_member_names_are_suffixed(): void
    {
        $this->generate('collisions');

        $source = $this->model('MemberCollisions');

        self::assertStringContainsString("public const this_ = 'this';", $source);
        self::assertStringContainsString("public const class_ = 'class';", $source);
    }

    // ─── Cycles ────────────────────────────────────────────────────────

    #[Test]
    public function a_self_referencing_schema_terminates(): void
    {
        $this->generate('cycles');

        $source = $this->model('Node');

        self::assertStringContainsString('public ?Node $parent = null;', $source);
        self::assertStringContainsString("'type' => Node::class,", $source);
    }

    #[Test]
    public function two_schemas_referencing_each_other_terminate(): void
    {
        $this->generate('cycles');

        self::assertStringContainsString('public ?Other $peer = null;', $this->model('Node'));
        self::assertStringContainsString('public ?Node $back = null;', $this->model('Other'));
    }

    #[Test]
    public function a_plain_alias_schema_reuses_the_target_class(): void
    {
        $result = $this->generate('cycles');
        $reasons = implode("\n", self::reasons($result));

        self::assertNotContains('HopA', $this->models());
        self::assertStringContainsString('[schema] hop-a — plain alias of `hop-b` — reuses that class', $reasons);
        self::assertStringContainsString('[schema] hop-b — plain alias of `node` — reuses that class', $reasons);
    }
}
