<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Threat model to be used for code scanning analysis. Use `remote` to
 * analyze only network sources and `remote_and_local` to include local
 * sources like filesystem access, command-line arguments, database reads,
 * environment variable and standard input.
 * @link https://docs.github.com/
 */
enum CodeScanningDefaultSetupThreatModel: string
{
    case unknown = 'unknown';
    case remote = 'remote';
    case remote_and_local = 'remote_and_local';
}
