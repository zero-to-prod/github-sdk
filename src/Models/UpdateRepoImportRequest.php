<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoImportRequest
{
    use DataModel;

    /** @see $vcs_url */
    public const vcs_url = 'vcs_url';
    #[Describe(['nullable' => true])]
    public ?string $vcs_url = null;

    /** @see $vcs */
    public const vcs = 'vcs';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoImportRequestVcs $vcs = null;

    /** @see $vcs_username */
    public const vcs_username = 'vcs_username';
    #[Describe(['nullable' => true])]
    public ?string $vcs_username = null;

    /** @see $vcs_password */
    public const vcs_password = 'vcs_password';
    #[Describe(['nullable' => true])]
    public ?string $vcs_password = null;

    /** @see $tfvc_project */
    public const tfvc_project = 'tfvc_project';
    #[Describe(['nullable' => true])]
    public ?string $tfvc_project = null;
}
