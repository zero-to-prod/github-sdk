<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The reaction to use
 * @link https://docs.github.com/
 */
enum ReactionContent: string
{
    case unknown = 'unknown';
    case plus_1 = '+1';
    case minus_1 = '-1';
    case laugh = 'laugh';
    case confused = 'confused';
    case heart = 'heart';
    case hooray = 'hooray';
    case rocket = 'rocket';
    case eyes = 'eyes';
}
