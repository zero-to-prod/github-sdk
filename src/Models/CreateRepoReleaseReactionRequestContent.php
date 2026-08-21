<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The [reaction
 * type](https://docs.github.com/rest/reactions/reactions#about-reactions) to
 * add to the release.
 * @link https://docs.github.com/
 */
enum CreateRepoReleaseReactionRequestContent: string
{
    case unknown = 'unknown';
    case plus_1 = '+1';
    case laugh = 'laugh';
    case heart = 'heart';
    case hooray = 'hooray';
    case rocket = 'rocket';
    case eyes = 'eyes';
}
