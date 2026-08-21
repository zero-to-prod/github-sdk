<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The language targeted by the CodeQL query
 * @link https://docs.github.com/
 */
enum CodeScanningVariantAnalysisLanguage: string
{
    case unknown = 'unknown';
    case actions = 'actions';
    case cpp = 'cpp';
    case csharp = 'csharp';
    case go = 'go';
    case java = 'java';
    case javascript = 'javascript';
    case python = 'python';
    case ruby = 'ruby';
    case rust = 'rust';
    case swift = 'swift';
}
