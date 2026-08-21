<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The registry type.
 * @link https://docs.github.com/
 */
enum OrgPrivateRegistryConfigurationRegistryType: string
{
    case unknown = 'unknown';
    case maven_repository = 'maven_repository';
    case nuget_feed = 'nuget_feed';
    case goproxy_server = 'goproxy_server';
    case npm_registry = 'npm_registry';
    case rubygems_server = 'rubygems_server';
    case cargo_registry = 'cargo_registry';
    case composer_repository = 'composer_repository';
    case docker_registry = 'docker_registry';
    case git_source = 'git_source';
    case helm_registry = 'helm_registry';
    case hex_organization = 'hex_organization';
    case hex_repository = 'hex_repository';
    case pub_repository = 'pub_repository';
    case python_index = 'python_index';
    case terraform_registry = 'terraform_registry';
}
