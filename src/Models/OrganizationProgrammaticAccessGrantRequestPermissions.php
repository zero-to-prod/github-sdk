<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Permissions requested, categorized by type of permission.
 * @link https://docs.github.com/
 */
class OrganizationProgrammaticAccessGrantRequestPermissions
{
    use DataModel;

    /** @see $organization */
    public const organization = 'organization';
    /** @var array<string, string> */
    #[Describe(['default' => []])]
    public array $organization;

    /** @see $repository */
    public const repository = 'repository';
    /** @var array<string, string> */
    #[Describe(['default' => []])]
    public array $repository;

    /** @see $other */
    public const other = 'other';
    /** @var array<string, string> */
    #[Describe(['default' => []])]
    public array $other;
}
