<?php

namespace Unit\Generator;

use PHPUnit\Framework\Attributes\Test;
use Tests\Unit\Generator\GeneratorCase;
use Zerotoprod\GitHubSdk\Generator\Document;
use Zerotoprod\GitHubSdk\Generator\Naming;
use Zerotoprod\GitHubSdk\Generator\RouteMapper;
use Zerotoprod\GitHubSdk\Generator\RouteOperation;
use Zerotoprod\GitHubSdk\Generator\RoutePlan;
use Zerotoprod\GitHubSdk\Generator\SchemaMapper;

class RouteMapperTest extends GeneratorCase
{
    private function plan(string $fixture, bool $webhooks = false): RoutePlan
    {
        $document = self::document($fixture);
        $naming = new Naming();
        $schemas = new SchemaMapper($document, $naming, 'https://docs.github.com/');
        $schemas->mapComponentSchemas();

        $this->mapper = new RouteMapper($document, $naming, $schemas);
        $this->schemas = $schemas;

        return $this->mapper->map($webhooks);
    }

    private RouteMapper $mapper;

    private SchemaMapper $schemas;

    /**
     * Both mappers record skips: route-shaped ones here, body-schema ones in the
     * SchemaMapper that owns `bodyClass()`.
     *
     * @return list<string>
     */
    private function reasonList(): array
    {
        return array_map(
            static fn(object $skip): string => (string) $skip,
            [...$this->mapper->skips(), ...$this->schemas->skips()],
        );
    }

    private function operation(RoutePlan $plan, string $name): RouteOperation
    {
        foreach ($plan->cases as $case) {
            foreach ($case->operations as $operation) {
                if ($operation->name === $name) {
                    return $operation;
                }
            }
        }

        self::fail("no operation named $name");
    }

    #[Test]
    public function one_case_is_emitted_per_path(): void
    {
        $plan = $this->plan('widgets');

        self::assertSame(['widgets', 'widget'], array_map(static fn(object $c): string => $c->name, $plan->cases));
        self::assertSame(['/v1/widgets', '/v1/widgets/{id}'], array_map(static fn(object $c): string => $c->path, $plan->cases));
    }

    #[Test]
    public function operations_are_ordered_get_post_put_patch_delete(): void
    {
        self::assertSame(['get', 'post', 'put', 'patch', 'delete'], RouteMapper::VERBS);
    }

    #[Test]
    public function path_params_come_out_in_path_order(): void
    {
        $plan = $this->plan('methods');

        self::assertSame(['id', 'mfa_id'], $this->operation($plan, 'deleteAccountMfaEnrollment')->pathParams);
    }

    #[Test]
    public function query_params_merge_path_level_then_operation_level_and_dedupe(): void
    {
        $plan = $this->plan('widgets');

        self::assertSame(['per_page', 'page'], $this->operation($plan, 'listWidgets')->queryParams);
        self::assertSame(['fields'], $this->operation($plan, 'getWidget')->queryParams);
    }

    #[Test]
    public function a_referenced_parameter_is_resolved(): void
    {
        $plan = $this->plan('widgets');

        self::assertContains('page', $this->operation($plan, 'listWidgets')->queryParams);
    }

    #[Test]
    public function a_parameter_without_a_name_is_ignored_and_reported(): void
    {
        $this->plan('bodies');

        self::assertContains(
            '[operation] GET /v1/nameless-param — a parameter has no `name` — ignored',
            $this->reasonList(),
        );
    }

    #[Test]
    public function an_unsupported_verb_is_reported_rather_than_dropped(): void
    {
        $this->plan('widgets');

        self::assertContains(
            '[operation] HEAD /v1/widgets/{id} — the SDK transport has no HttpMethod case for this verb',
            $this->reasonList(),
        );
    }

    #[Test]
    public function a_path_with_only_unsupported_verbs_yields_no_case(): void
    {
        $plan = $this->plan('methods');
        $reasons = $this->reasonList();

        self::assertNotContains('no_verbs', array_map(static fn(object $c): string => $c->name, $plan->cases));
        self::assertContains('[operation] OPTIONS /v1/no-verbs — the SDK transport has no HttpMethod case for this verb', $reasons);
        self::assertContains('[path] /v1/no-verbs — no supported operations — no route case emitted', $reasons);
    }

    #[Test]
    public function put_and_patch_on_one_path_never_produce_two_updates(): void
    {
        $plan = $this->plan('methods');

        $both = array_values(array_filter($plan->cases, static fn(object $c): bool => $c->name === 'both'))[0];
        $names = array_map(static fn(RouteOperation $o): string => $o->name, $both->operations);

        self::assertSame(['updateBoth', 'patchBoth'], $names);
        self::assertSame(['PUT', 'PATCH'], array_map(static fn(RouteOperation $o): string => $o->httpMethod, $both->operations));
    }

    #[Test]
    public function an_inline_request_body_is_promoted_to_a_request_class(): void
    {
        $plan = $this->plan('bodies');

        self::assertSame('CreateThingRequest', $this->operation($plan, 'createThing')->request);
    }

    #[Test]
    public function an_inline_response_body_is_promoted_to_a_response_class(): void
    {
        $plan = $this->plan('bodies');

        self::assertSame('CreateThingResponse', $this->operation($plan, 'createThing')->response);
    }

    #[Test]
    public function a_referenced_request_body_reuses_the_named_class(): void
    {
        $plan = $this->plan('bodies');
        $operation = $this->operation($plan, 'createRefBody');

        self::assertSame('Thing', $operation->request);
        self::assertSame('Thing', $operation->response);
    }

    #[Test]
    public function the_lowest_2xx_response_wins(): void
    {
        $plan = $this->plan('bodies');

        self::assertSame('Thing', $this->operation($plan, 'listMultiSuccesses')->response);
    }

    #[Test]
    public function a_204_response_leaves_the_response_class_null(): void
    {
        $plan = $this->plan('widgets');

        self::assertNull($this->operation($plan, 'deleteWidget')->response);
    }

    #[Test]
    public function a_bare_array_response_becomes_a_list_of_the_referenced_class(): void
    {
        $plan = $this->plan('bodies');
        $operation = $this->operation($plan, 'listTags');

        self::assertNull($operation->response);
        self::assertSame('Thing', $operation->listOf);
    }

    #[Test]
    public function a_bare_array_response_promotes_inline_items_to_a_named_class(): void
    {
        $plan = $this->plan('bodies');
        $operation = $this->operation($plan, 'listLabels');

        self::assertNull($operation->response);
        self::assertSame('ListLabelsResponseItem', $operation->listOf);
    }

    #[Test]
    public function a_bare_array_of_scalars_emits_no_model_and_is_reported(): void
    {
        $plan = $this->plan('bodies');

        self::assertNull($this->operation($plan, 'listThings')->response);
        self::assertNull($this->operation($plan, 'listThings')->listOf);
        self::assertContains(
            '[body] GET /v1/things 200 response — body schema is a list of `string` — no element model emitted, raw value passed through',
            $this->reasonList(),
        );
    }

    #[Test]
    public function a_bare_array_with_no_items_is_reported_as_a_list_of_mixed(): void
    {
        $document = Document::fromArray([
            'paths' => ['/v1/things' => ['get' => ['responses' => ['200' => [
                'content' => ['application/json' => ['schema' => ['type' => 'array']]],
            ]]]]],
        ]);
        $naming = new Naming();
        $schemas = new SchemaMapper($document, $naming, 'docs');
        $mapper = new RouteMapper($document, $naming, $schemas);

        $plan = $mapper->map();

        self::assertNull($plan->cases[0]->operations[0]->listOf);
        self::assertContains(
            '[body] GET /v1/things 200 response — body schema is a list of `mixed` — no element model emitted, raw value passed through',
            array_map(static fn(object $skip): string => (string) $skip, $schemas->skips()),
        );
    }

    #[Test]
    public function a_request_body_that_is_an_array_still_has_no_model(): void
    {
        // Only responses can be a bare list — `request:` is always one object.
        $document = Document::fromArray([
            'paths' => ['/v1/things' => ['post' => [
                'requestBody' => ['content' => ['application/json' => ['schema' => [
                    'type' => 'array', 'items' => ['type' => 'string'],
                ]]]],
                'responses' => ['204' => ['description' => 'gone']],
            ]]],
        ]);
        $naming = new Naming();
        $schemas = new SchemaMapper($document, $naming, 'docs');
        $mapper = new RouteMapper($document, $naming, $schemas);

        $plan = $mapper->map();

        self::assertNull($plan->cases[0]->operations[0]->request);
        self::assertContains(
            '[body] POST /v1/things request — body schema is `array<int, string>`, not an object — no model emitted, raw value passed through',
            array_map(static fn(object $skip): string => (string) $skip, $schemas->skips()),
        );
    }

    #[Test]
    public function a_non_json_body_is_skipped_with_the_media_type_named(): void
    {
        $this->plan('bodies');
        $reasons = $this->reasonList();

        self::assertContains('[body] POST /v1/text request — request body offers only text/plain — the SDK speaks JSON only', $reasons);
        self::assertContains('[body] POST /v1/text 200 response — 200 response offers only text/x-markdown — the SDK speaks JSON only', $reasons);
    }

    #[Test]
    public function an_operation_with_no_2xx_response_is_reported(): void
    {
        $this->plan('bodies');

        self::assertContains('[body] POST /v1/no-success — no 2xx response declared — no response model', $this->reasonList());
    }

    #[Test]
    public function a_body_with_no_content_or_no_schema_is_simply_absent(): void
    {
        $plan = $this->plan('bodies');

        foreach (['createEmpty', 'createNoSchema'] as $name) {
            $operation = $this->operation($plan, $name);
            self::assertNull($operation->request);
            self::assertNull($operation->response);
        }
    }

    #[Test]
    public function a_deprecated_operation_is_flagged(): void
    {
        $plan = $this->plan('methods');

        self::assertTrue($this->operation($plan, 'getDeprecated')->deprecated);
        self::assertFalse($this->operation($plan, 'listResources')->deprecated);
    }

    #[Test]
    public function a_case_summary_falls_back_to_the_first_operation_that_has_one(): void
    {
        $plan = $this->plan('bodies');

        $things = array_values(array_filter($plan->cases, static fn(object $c): bool => $c->path === '/v1/things'))[0];

        self::assertSame('Create a thing from an inline body.', $things->summary);
    }

    #[Test]
    public function a_path_level_summary_is_preferred(): void
    {
        $plan = $this->plan('widgets');

        self::assertSame('List every widget.', $plan->cases[0]->summary);
    }

    #[Test]
    public function a_case_with_no_summary_anywhere_has_none(): void
    {
        $plan = $this->plan('methods');

        self::assertNull($plan->cases[0]->summary);
    }

    #[Test]
    public function a_summary_on_the_path_item_itself_is_used(): void
    {
        $document = Document::fromArray([
            'paths' => ['/v1/things' => [
                'summary' => 'Path-level summary.',
                'get' => ['summary' => 'Operation summary.', 'responses' => ['200' => ['description' => 'ok']]],
            ]],
        ]);
        $naming = new Naming();
        $mapper = new RouteMapper($document, $naming, new SchemaMapper($document, $naming, 'docs'));

        self::assertSame('Path-level summary.', $mapper->map()->cases[0]->summary);
    }

    #[Test]
    public function a_path_item_description_stands_in_for_a_missing_summary(): void
    {
        $document = Document::fromArray([
            'paths' => ['/v1/things' => [
                'description' => 'Path-level description.',
                'get' => ['responses' => ['200' => ['description' => 'ok']]],
            ]],
        ]);
        $naming = new Naming();
        $mapper = new RouteMapper($document, $naming, new SchemaMapper($document, $naming, 'docs'));

        self::assertSame('Path-level description.', $mapper->map()->cases[0]->summary);
    }

    #[Test]
    public function a_path_item_behind_a_ref_is_resolved(): void
    {
        $document = Document::fromArray([
            'paths' => ['/v1/things' => ['$ref' => '#/x/thing']],
            'x' => ['thing' => ['get' => ['responses' => ['200' => ['description' => 'ok']]]]],
        ]);
        $naming = new Naming();
        $mapper = new RouteMapper($document, $naming, new SchemaMapper($document, $naming, 'docs'));

        $plan = $mapper->map();

        self::assertCount(1, $plan->cases);
        self::assertSame('listThings', $plan->cases[0]->operations[0]->name);
    }

    // ─── Webhooks ──────────────────────────────────────────────────────

    #[Test]
    public function webhooks_are_off_by_default_and_counted(): void
    {
        $plan = $this->plan('webhooks');

        self::assertCount(1, $plan->cases);
        self::assertContains(
            '[webhook] 2 webhook definition(s) — webhooks are off by default — pass --webhooks to emit their payload models',
            $this->reasonList(),
        );
    }

    #[Test]
    public function enabling_webhooks_emits_payload_models_but_never_route_cases(): void
    {
        $plan = $this->plan('webhooks', true);
        $reasons = $this->reasonList();

        self::assertCount(1, $plan->cases);
        self::assertSame('/v1/pings', $plan->cases[0]->path);
        self::assertContains(
            '[webhook] branch_protection_rule_1 — payload model emitted, but a webhook is inbound — no route case',
            $reasons,
        );
        self::assertContains(
            '[webhook] no_body_event — payload model emitted, but a webhook is inbound — no route case',
            $reasons,
        );
    }

    #[Test]
    public function a_document_with_no_webhooks_reports_nothing(): void
    {
        $this->plan('widgets', true);

        foreach ($this->reasonList() as $reason) {
            self::assertStringNotContainsString('[webhook]', $reason);
        }
    }
}
