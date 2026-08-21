<?php

namespace Zerotoprod\Sdk\Internal;

use RuntimeException;
use Zerotoprod\Sdk\HttpTransport;
use Zerotoprod\Sdk\Response;

/**
 * @internal
 * @implements HttpTransport<Response>
 */
class Fake implements HttpTransport
{
    /** @var Response[] */
    private array $queue = [];

    /** @var array<int, array{method: string, url: string, options: array<string, mixed>}> */
    private array $recorded = [];

    public function queue(Response ...$responses): static
    {
        array_push($this->queue, ...$responses);
        return $this;
    }

    /** @param  array<string, mixed>  $options */
    public function request(string $method, string $url, array $options = []): Response
    {
        $this->recorded[] = [
            'method'  => strtoupper($method),
            'url'     => $url,
            'options' => $options,
        ];

        return array_shift($this->queue) ?? new Response(200, [], '');
    }

    /** @return array<int, array{method: string, url: string, options: array<string, mixed>}> */
    public function recorded(): array
    {
        return $this->recorded;
    }

    public function assertSent(string $method, ?string $url = null): void
    {
        foreach ($this->recorded as $request) {
            if (strtoupper($method) === $request['method'] && ($url === null || str_contains($request['url'], $url))) {
                return;
            }
        }
        throw new RuntimeException(
            "No matching request [" . strtoupper($method) . "]"
            . ($url ? " [$url]" : "")
            . " was recorded.",
        );
    }

    public function assertNotSent(string $method, ?string $url = null): void
    {
        foreach ($this->recorded as $request) {
            if (strtoupper($method) === $request['method'] && ($url === null || str_contains($request['url'], $url))) {
                throw new RuntimeException(
                    "Unexpected request [" . strtoupper($method) . "]"
                    . ($url ? " [$url]" : "")
                    . " was recorded.",
                );
            }
        }
    }

    public function assertSentCount(int $expected): void
    {
        $actual = count($this->recorded);
        if ($actual !== $expected) {
            throw new RuntimeException(
                "Expected $expected requests, but $actual were recorded.",
            );
        }
    }
}
