<?php

namespace Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\Sdk\Internal\QueryNormalizer;
use Zerotoprod\Sdk\Models\Query;

class QueryNormalizerTest extends TestCase
{
    #[Test]
    public function passes_through_untransformed_keys(): void
    {
        $out = QueryNormalizer::normalize([Query::per_page => 25, Query::where_in => ['id' => ['a', 'b']]]);

        self::assertSame([Query::per_page => 25, Query::where_in => ['id' => ['a', 'b']]], $out);
    }

    #[Test]
    public function flat_two_tuple_where_is_wrapped(): void
    {
        $out = QueryNormalizer::normalize([Query::where => ['name', 'first']]);

        self::assertSame([Query::where => [['name', 'first']]], $out);
    }

    #[Test]
    public function flat_three_tuple_where_with_operator_is_wrapped(): void
    {
        $out = QueryNormalizer::normalize([Query::where => ['name', 'LIKE', '%first%']]);

        self::assertSame([Query::where => [['name', 'LIKE', '%first%']]], $out);
    }

    #[Test]
    public function list_of_tuples_passes_through(): void
    {
        $where = [['name', 'first'], ['status', 'LIKE', 'act%']];

        self::assertSame([Query::where => $where], QueryNormalizer::normalize([Query::where => $where]));
    }

    #[Test]
    public function associative_where_passes_through(): void
    {
        $where = ['name' => 'first', 'status' => 'active'];

        self::assertSame([Query::where => $where], QueryNormalizer::normalize([Query::where => $where]));
    }

    #[Test]
    public function with_string_passes_through(): void
    {
        self::assertSame([Query::with => 'parts'], QueryNormalizer::normalize([Query::with => 'parts']));
    }

    #[Test]
    public function with_dot_string_passes_through(): void
    {
        self::assertSame([Query::with => 'parts.vendor'], QueryNormalizer::normalize([Query::with => 'parts.vendor']));
    }

    #[Test]
    public function with_flat_array_is_comma_joined(): void
    {
        self::assertSame([Query::with => 'parts,owner'], QueryNormalizer::normalize([Query::with => ['parts', 'owner']]));
    }

    #[Test]
    public function with_nested_array_flattens_to_dot_paths(): void
    {
        $out = QueryNormalizer::normalize([Query::with => ['author' => ['contacts', 'publisher'], 'reviews']]);

        self::assertSame([Query::with => 'author.contacts,author.publisher,reviews'], $out);
    }

    #[Test]
    public function with_deeply_nested_array_flattens(): void
    {
        $out = QueryNormalizer::normalize([Query::with => ['author' => ['contacts' => ['phone']]]]);

        self::assertSame([Query::with => 'author.contacts.phone'], $out);
    }

    #[Test]
    public function with_assoc_string_value_joins_with_dot(): void
    {
        $out = QueryNormalizer::normalize([Query::with => ['author' => 'contacts']]);

        self::assertSame([Query::with => 'author.contacts'], $out);
    }

    #[Test]
    public function empty_where_passes_through(): void
    {
        self::assertSame([Query::where => []], QueryNormalizer::normalize([Query::where => []]));
    }

    #[Test]
    public function with_a_non_string_non_array_value_normalizes_to_an_empty_string(): void
    {
        self::assertSame([Query::with => ''], QueryNormalizer::normalize([Query::with => 42]));
    }

    #[Test]
    public function with_skips_empty_and_non_string_leaves(): void
    {
        $out = QueryNormalizer::normalize([Query::with => ['parts', '', 5, 'owner' => '']]);

        self::assertSame([Query::with => 'parts'], $out);
    }

    #[Test]
    public function with_flattens_int_keyed_nested_arrays_under_a_prefix(): void
    {
        $out = QueryNormalizer::normalize([Query::with => ['parts' => [['vendor']]]]);

        self::assertSame([Query::with => 'parts.vendor'], $out);
    }

    #[Test]
    public function where_with_more_than_three_elements_passes_through(): void
    {
        $where = ['a', 'b', 'c', 'd'];

        self::assertSame([Query::where => $where], QueryNormalizer::normalize([Query::where => $where]));
    }

    #[Test]
    public function non_array_where_passes_through(): void
    {
        self::assertSame([Query::where => 'raw'], QueryNormalizer::normalize([Query::where => 'raw']));
    }

    #[Test]
    public function non_array_fields_passes_through(): void
    {
        self::assertSame([Query::fields => 'id,name'], QueryNormalizer::normalize([Query::fields => 'id,name']));
    }

    #[Test]
    public function fields_drops_non_array_column_lists(): void
    {
        $out = QueryNormalizer::normalize([Query::fields => ['widgets' => ['id'], 'parts' => 'vendor']]);

        self::assertSame([Query::fields => ['widgets' => 'id']], $out);
    }

    #[Test]
    public function fields_array_values_are_comma_joined(): void
    {
        $out = QueryNormalizer::normalize([
            Query::fields => ['widget' => ['id', 'name']],
        ]);

        self::assertSame([Query::fields => ['widget' => 'id,name']], $out);
    }

    #[Test]
    public function fields_with_multiple_relations(): void
    {
        $out = QueryNormalizer::normalize([
            Query::fields => [
                'widgets' => ['id', 'name'],
                'parts' => ['widget_id', 'vendor'],
            ],
        ]);

        self::assertSame([
            Query::fields => [
                'widgets' => 'id,name',
                'parts' => 'widget_id,vendor',
            ],
        ], $out);
    }
}
