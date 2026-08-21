<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Internal;

use BackedEnum;
use Zerotoprod\DataModel\Describe;

/** @internal */
class Route
{
    use DataModel;

    /** @see $route */
    public const route = 'route';
    #[Describe(['default' => ''])]
    public string $route;

    /** @see $path_params */
    public const path_params = 'path_params';
    /** @var array<string, string> */
    #[Describe(['default' => []])]
    public array $path_params;

    /** @see $params */
    public const params = 'params';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $params;

    public function render(): string
    {
        $query = http_build_query(data: $this->params);
        $route = $this->render_url(url: $this->route, parameters: $this->path_params);

        return $query !== '' && $query !== '0'
            ? $route . '?' . $query
            : $route;
    }

    /** @param  array<string, string>  $parameters */
    private function render_url(string $url, array $parameters): string
    {
        foreach ($parameters as $key => $parameter) {
            $url = str_replace(search: "{{$key}}", replace: $parameter, subject: $url);
        }

        return $url;
    }

    /**
     * Build a route from any string-backed route enum case.
     *
     * Typed against {@see BackedEnum} rather than {@see \Zerotoprod\GitHubSdk\ApiRoute}
     * so a client configured with {@see \Zerotoprod\GitHubSdk\GitHubSdkConfig::route_enum}
     * can dispatch a different route enum entirely.
     *
     * @param  array<string, mixed>   $params
     * @param  array<string, string>  $path_params
     */
    public static function for(BackedEnum $endpoint, array $params = [], array $path_params = []): self
    {
        return self::from([
            self::route => (string) $endpoint->value,
            self::params => array_filter($params),
            self::path_params => $path_params,
        ]);
    }
}
