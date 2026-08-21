<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use Tests\Fixtures\Models\FixtureThing;
use Zerotoprod\Sdk\Internal\AdminApi;
use Zerotoprod\Sdk\Internal\HasRoute;
use Zerotoprod\Sdk\Internal\HttpMethod;

/**
 * A second route enum that reuses one of {@see FixtureRoute}'s method names on a
 * different path.
 *
 * It exists to pin down the resolution cache: `SdkApi` memoizes the attribute
 * scan for the lifetime of the process, so the cache has to be keyed by enum
 * class or the first client to dispatch would decide what every later one sees.
 */
enum AltFixtureRoute: string
{
    #[HasRoute]
    #[AdminApi(HttpMethod::GET, 'getThing', pathParams: ['id'], response: FixtureThing::class)]
    case thing = '/v2/alt-things/{id}';
}
