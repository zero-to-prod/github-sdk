<?php

declare(strict_types=1);

namespace Tests\Fixtures\Models;

/** Backed enum with an `unknown` fallback, exactly as the generator emits one. */
enum FixtureThingStatus: string
{
    case unknown = 'unknown';
    case active = 'active';
    case archived = 'archived';
}
