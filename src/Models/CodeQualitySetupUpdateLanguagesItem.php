<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum CodeQualitySetupUpdateLanguagesItem: string
{
    case unknown = 'unknown';
    case csharp = 'csharp';
    case go = 'go';
    case java_kotlin = 'java-kotlin';
    case javascript_typescript = 'javascript-typescript';
    case python = 'python';
    case ruby = 'ruby';
}
