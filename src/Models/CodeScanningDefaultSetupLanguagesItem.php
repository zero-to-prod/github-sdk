<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum CodeScanningDefaultSetupLanguagesItem: string
{
    case unknown = 'unknown';
    case actions = 'actions';
    case c_cpp = 'c-cpp';
    case csharp = 'csharp';
    case go = 'go';
    case java_kotlin = 'java-kotlin';
    case javascript_typescript = 'javascript-typescript';
    case javascript = 'javascript';
    case python = 'python';
    case ruby = 'ruby';
    case typescript = 'typescript';
    case swift = 'swift';
}
