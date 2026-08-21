<?php

namespace Zerotoprod\Sdk;

use BackedEnum;
use BadMethodCallException;
use ReflectionEnum;
use Throwable;
use Zerotoprod\Sdk\Internal\AdminApi;
use Zerotoprod\Sdk\Internal\Fake;
use Zerotoprod\Sdk\Internal\HttpMethod;
use Zerotoprod\Sdk\Internal\QueryNormalizer;
use Zerotoprod\Sdk\Internal\Route;
use Zerotoprod\Sdk\Models\CreateWidgetRequest;
use Zerotoprod\Sdk\Models\UpdateWidgetRequest;
use Zerotoprod\Sdk\Models\Widget;
use Zerotoprod\Sdk\Models\WidgetsResponse;
use Zerotoprod\Sdk\Models\WidgetTag;

/**
 * Wrapper client for the SDK.
 * The response type of HTTP methods is determined by the HttpTransport.
 *
 * @template TResponse
 * @method ApiResult<Widget>|Response getWidget(string $id, array<string, mixed> $options = [])
 * @method ApiResult<Widget>|Response updateWidget(string $id, UpdateWidgetRequest|array<string, mixed> $data = [], array<string, mixed> $options = [])
 * @method ApiResult<null>|Response deleteWidget(string $id, array<string, mixed> $options = [])
 * @method ApiResult<WidgetsResponse>|Response listWidgets(array<string, mixed> $options = []) Query: where, where_in, where_not_in, per_page, with, fields
 * @method ApiResult<Widget>|Response createWidget(CreateWidgetRequest|array<string, mixed> $data = [], array<string, mixed> $options = [])
 * @method ApiResult<array<int, WidgetTag>>|Response listWidgetTags(string $id, array<string, mixed> $options = [])
 */
class SdkApi
{
    /**
     * Resolved configuration available for inspection after construction.
     */
    public readonly SdkConfig $config;

    /**
     * @param  SdkConfig|array{
     *     url?: string|null,
     *     headers?: array<string, string>,
     *     model_namespace?: string|null,
     *     route_enum?: class-string<BackedEnum>|null,
     * }                                 $config  Connection settings. `headers` are sent with
     *                                            every request — that is where auth goes.
     *                                            `route_enum` names the
     *                                            string-backed enum whose `#[AdminApi]`
     *                                            attributes this client dispatches; it defaults
     *                                            to {@see ApiRoute}.
     * @param  HttpTransport<TResponse>  $httpTransport  HTTP transport. Defaults to CurlHttpTransport.
     * @param  array{
     *     before?: callable(HookContext<TResponse>): (HookContext<TResponse>|void)|array<int, callable(HookContext<TResponse>): (HookContext<TResponse>|void)>,
     *     after?: callable(HookContext<TResponse>): void|array<int, callable(HookContext<TResponse>): void>,
     *     onException?: callable(HookContext<TResponse>, Throwable): void|array<int, callable(HookContext<TResponse>, Throwable): void>,
     * }  $hooks  Lifecycle hooks invoked around every HTTP request. Each phase accepts either a
     *            single callable or a list of callables. `before` hooks receive a
     *            {@see HookContext} and may return a (mutated) HookContext to alter the request;
     *            `after` hooks receive the context with the response attached and observe only;
     *            `onException` hooks receive the context and the thrown Throwable when the transport
     *            fails (e.g. a connection error), after which the exception is re-thrown.
     *            All are useful for logging, global enforcement, inspection, and validation.
     */
    public function __construct(
        array|SdkConfig $config = [],
        private readonly HttpTransport $httpTransport = new CurlHttpTransport(),
        private readonly array $hooks = [],
    ) {
        $this->config = $config instanceof SdkConfig
            ? $config
            : SdkConfig::fromConfig($config);
    }

    /**
     * Sends a request through the transport, invoking the registered `before`
     * and `after` lifecycle hooks around it.
     *
     * Each `before` hook receives the request {@see HookContext}; to alter the
     * outgoing request it returns a copy. After
     * the response is received, each `after` hook receives the context with the
     * response attached.
     *
     * If the transport throws, each `onException` hook receives the context
     * (hook `onException`) and the thrown {@see Throwable}, then the
     * exception is re-thrown — `after` hooks do not run.
     *
     * @param  array<string, mixed>  $options
     *
     * @return TResponse
     * @throws Throwable
     */
    private function dispatch(string|HttpMethod $HttpMethod, string $url, array $options): mixed
    {
        /** @var HookContext<TResponse> $HookContext */
        $HookContext = HookContext::from([
            HookContext::Hook => Hook::before,
            HookContext::HttpMethod => $HttpMethod,
            HookContext::url => $url,
            HookContext::options => $options,
        ]);

        foreach ($this->hooksFor(Hook::before) as $hook) {
            $result = $hook($HookContext);
            if ($result instanceof HookContext) {
                $HookContext = $result;
            }
        }

        try {
            $response = $this->httpTransport->request(
                method: $HookContext->HttpMethod->value,
                url: $HookContext->url,
                options: $HookContext->options,
            );
        } catch (Throwable $e) {
            $HookContext = HookContext::from([
                ...$HookContext->toArray(),
                HookContext::Hook => Hook::onException->value,
            ]);

            foreach ($this->hooksFor(Hook::onException) as $hook) {
                $hook($HookContext, $e);
            }

            throw $e;
        }

        $HookContext = HookContext::from([
            ...$HookContext->toArray(),
            HookContext::Hook => Hook::after,
            HookContext::response => $response,
        ]);

        foreach ($this->hooksFor(Hook::after) as $hook) {
            $hook($HookContext);
        }

        return $response;
    }

    /**
     * Returns the hooks registered for a phase as a list of callables.
     *
     * Each phase may be configured with either a single callable or a list of
     * callables; a lone callable is normalized to a single-element list.
     *
     * @return array<int, callable>
     */
    private function hooksFor(Hook $phase): array
    {
        $hooks = $this->hooks[$phase->value] ?? [];

        return is_callable($hooks) ? [$hooks] : $hooks;
    }

    /**
     * Dispatches API methods declared via #[AdminApi] attributes on ApiRoute cases.
     * Arguments are mapped positionally: path params, query params, request body (if declared), then options.
     * The body accepts a model instance (serialized via toArray()) or a raw array.
     * When a response model is declared, returns an ApiResult wrapping the hydrated model (on 2xx)
     * or hydrated Errors (on failure). When `listOf:` is declared instead, the body is a bare JSON
     * array and $data is an `array<int, ElementClass>`; an empty array yields `[]`, and a body that
     * is not a JSON array — or an element that is not a JSON object — is skipped rather than
     * guessed at. Pass Options::raw => true in $options to skip wrapping.
     *
     * @param  string             $name       Method name matching an AdminApi::$name declaration.
     * @param  array<int, mixed>  $arguments  Positional arguments.
     *
     * @return ApiResult<mixed>|TResponse|mixed
     * @throws Throwable
     */
    public function __call(string $name, array $arguments): mixed
    {
        [$route, $admin] = $this->resolveAdminApi($name);

        $arguments = array_values($arguments);
        $i = 0;

        /** @var array<string, string> $pathParams */
        $pathParams = [];
        foreach ($admin->pathParams as $param) {
            $value = $arguments[$i++] ?? '';
            assert(is_string($value));
            $pathParams[$param] = $value;
        }

        $hasBody = $admin->request !== null;

        /** @var array<string, mixed> $data */
        $data = [];
        if ($hasBody) {
            $raw = $arguments[$i++] ?? [];
            $data = is_object($raw) && method_exists($raw, 'toArray') ? $raw->toArray() : (array) $raw;
        }

        /** @var array<string, mixed> $options */
        $options = $arguments[$i] ?? [];

        $returnRaw = $options[Options::raw] ?? false;
        unset($options[Options::raw]);

        /** @var array<string, mixed> $extraQuery */
        $extraQuery = $options[Options::query] ?? [];
        unset($options[Options::query]);

        $extraQuery = QueryNormalizer::normalize($extraQuery);

        /** @var array<string, string> $callHeaders */
        $callHeaders = $options[Options::headers] ?? [];
        unset($options[Options::headers]);

        // Config headers are the baseline every request carries (auth lives
        // there); a per-call header of the same name wins, so one request can
        // override the default without reconfiguring the client.
        $extraHeaders = [...$this->config->headers, ...$callHeaders];

        $response = $this->dispatch(
            HttpMethod: $admin->method->value,
            url: $this->config->url . Route::for($route, $extraQuery, $pathParams)->render(),
            options: [
                ...($hasBody ? ['json' => $data] : []),
                ...($extraHeaders !== [] ? [Options::headers => $extraHeaders] : []),
                ...$options,
            ],
        );

        if (!$returnRaw && $response instanceof Response) {
            if ($response->failed()) {
                $errorsClass = $this->config->model_namespace . '\\Errors';
                if (!class_exists($errorsClass)) {
                    $errorsClass = Models\Errors::class;
                }

                /** @var array<array-key, mixed> $body */
                $body = is_array($response->json()) ? $response->json() : [];

                return new ApiResult(
                    response: $response,
                    errors: $errorsClass::from($body),
                );
            }

            if ($admin->listOf !== null) {
                return new ApiResult(
                    response: $response,
                    data: $this->hydrateList($this->modelClass($admin->listOf), $this->payload($response)),
                );
            }

            if ($admin->response !== null) {
                $class = $this->modelClass($admin->response);

                return new ApiResult(
                    response: $response,
                    data: $class::from($this->payload($response)),
                );
            }

            return new ApiResult(response: $response);
        }

        return $response;
    }

    /**
     * The part of a 2xx body a model hydrates from: the `data` envelope key
     * when the response wraps its payload in one, otherwise the whole body.
     *
     * @return array<array-key, mixed>
     */
    private function payload(Response $response): array
    {
        $body = $response->json();

        // A 2xx body that decodes to a scalar (`"ok"`, `42`) or does not decode
        // at all is nothing a model can hydrate from. Hand back an empty payload
        // rather than letting the scalar reach a model — the raw body is always
        // still on `$result->response`.
        if (!is_array($body)) {
            return [];
        }

        return is_array($body['data'] ?? null) ? $body['data'] : $body;
    }

    /**
     * Hydrates a bare JSON array body into a list of models.
     *
     * Only a JSON array hydrates into a list, and only its object elements
     * hydrate into models: a body that is not a list yields `[]`, and an
     * element that is not an object is skipped rather than guessed at. The raw
     * body is always still there on `$result->response`.
     *
     * @param  class-string             $class
     * @param  array<array-key, mixed>  $payload
     * @return list<object>
     */
    private function hydrateList(string $class, array $payload): array
    {
        $elements = [];

        if (array_is_list($payload)) {
            foreach ($payload as $element) {
                if (is_array($element)) {
                    $elements[] = $class::from($element);
                }
            }
        }

        return $elements;
    }

    /**
     * Resolves a class declared on an #[AdminApi] attribute — `request`,
     * `response` or `listOf` — against `SdkConfig::model_namespace` first, so a
     * published override wins, falling back per class to the declared one.
     *
     * @return class-string
     */
    private function modelClass(string $declared): string
    {
        /** @var class-string $class */
        $class = $this->config->model_namespace . '\\' . AdminApi::shortName($declared);

        if (!class_exists($class)) {
            /** @var class-string $class */
            $class = AdminApi::defaultFqcn($declared);
        }

        return $class;
    }

    /**
     * Resolves an API method name to its route case and AdminApi attribute.
     *
     * The enum reflected over is {@see SdkConfig::route_enum}, which defaults to
     * {@see ApiRoute}. Results are cached for the lifetime of the process and
     * keyed by enum class, so two clients configured with different route enums
     * coexist without either seeing the other's methods.
     *
     * @return array{BackedEnum, AdminApi}
     */
    private function resolveAdminApi(string $name): array
    {
        /** @var array<class-string<BackedEnum>, array<string, array{BackedEnum, AdminApi}>> $cache */
        static $cache = [];

        $enum = $this->config->route_enum;

        if (!isset($cache[$enum])) {
            $resolved = [];

            foreach ((new ReflectionEnum($enum))->getCases() as $case) {
                foreach ($case->getAttributes(AdminApi::class) as $attr) {
                    /** @var AdminApi $instance */
                    $instance = $attr->newInstance();
                    // getCases() is typed as unit cases; a route enum is always
                    // string-backed, which is what Route::for() needs.
                    /** @var BackedEnum $value */
                    $value = $case->getValue();
                    $resolved[$instance->name] = [$value, $instance];
                }
            }

            $cache[$enum] = $resolved;
        }

        return $cache[$enum][$name] ?? throw new BadMethodCallException("Method $name does not exist.");
    }

    /**
     * Returns [$api, $fake] for testing. Queue responses on $fake,
     * call methods on $api, then assert with $fake->assertSent().
     *
     * @param  array{
     *     url?: string|null,
     *     headers?: array<string, string>,
     *     model_namespace?: string|null,
     *     route_enum?: class-string<BackedEnum>|null,
     * }  $config
     *
     * @return array{SdkApi<Response>, Fake}
     */
    public static function fake(array $config = []): array
    {
        $fake = new Fake();

        return [new self($config, $fake), $fake];
    }
}
