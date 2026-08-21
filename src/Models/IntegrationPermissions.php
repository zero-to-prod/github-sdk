<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The set of permissions for the GitHub app
 * @link https://docs.github.com/
 */
class IntegrationPermissions
{
    use DataModel;

    /** @see $issues */
    public const issues = 'issues';
    #[Describe(['nullable' => true])]
    public ?string $issues = null;

    /** @see $checks */
    public const checks = 'checks';
    #[Describe(['nullable' => true])]
    public ?string $checks = null;

    /** @see $metadata */
    public const metadata = 'metadata';
    #[Describe(['nullable' => true])]
    public ?string $metadata = null;

    /** @see $contents */
    public const contents = 'contents';
    #[Describe(['nullable' => true])]
    public ?string $contents = null;

    /** @see $deployments */
    public const deployments = 'deployments';
    #[Describe(['nullable' => true])]
    public ?string $deployments = null;
}
