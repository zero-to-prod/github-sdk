<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BranchRestrictionPolicyAppsItemPermissions
{
    use DataModel;

    /** @see $metadata */
    public const metadata = 'metadata';
    #[Describe(['nullable' => true])]
    public ?string $metadata = null;

    /** @see $contents */
    public const contents = 'contents';
    #[Describe(['nullable' => true])]
    public ?string $contents = null;

    /** @see $issues */
    public const issues = 'issues';
    #[Describe(['nullable' => true])]
    public ?string $issues = null;

    /** @see $single_file */
    public const single_file = 'single_file';
    #[Describe(['nullable' => true])]
    public ?string $single_file = null;
}
