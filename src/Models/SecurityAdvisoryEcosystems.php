<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The package's language or package management ecosystem.
 * @link https://docs.github.com/
 */
enum SecurityAdvisoryEcosystems: string
{
    case unknown = 'unknown';
    case rubygems = 'rubygems';
    case npm = 'npm';
    case pip = 'pip';
    case maven = 'maven';
    case nuget = 'nuget';
    case composer = 'composer';
    case go = 'go';
    case rust = 'rust';
    case erlang = 'erlang';
    case actions = 'actions';
    case pub = 'pub';
    case other = 'other';
    case swift = 'swift';
}
