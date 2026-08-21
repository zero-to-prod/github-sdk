<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The vulnerable dependency's relationship to your project. > [!NOTE] > We
 * are rolling out support for dependency relationship across ecosystems.
 * This value will be "unknown" for all dependencies in unsupported
 * ecosystems.
 * @link https://docs.github.com/
 */
enum DependabotAlertWithRepositoryDependencyRelationship: string
{
    case unknown = 'unknown';
    case direct = 'direct';
    case transitive = 'transitive';
    case inconclusive = 'inconclusive';
}
