<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum PackagePackageType: string
{
    case unknown = 'unknown';
    case npm = 'npm';
    case maven = 'maven';
    case rubygems = 'rubygems';
    case docker = 'docker';
    case nuget = 'nuget';
    case container = 'container';
}
