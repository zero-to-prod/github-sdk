<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The duration of the interaction restriction. Default: `one_day`.
 * @link https://docs.github.com/
 */
enum InteractionExpiry: string
{
    case unknown = 'unknown';
    case one_day = 'one_day';
    case three_days = 'three_days';
    case one_week = 'one_week';
    case one_month = 'one_month';
    case six_months = 'six_months';
}
