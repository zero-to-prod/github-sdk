<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The configuration for GitHub Pages for a repository.
 * @link https://docs.github.com/
 */
class Page
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?PageStatus $status = null;

    /** @see $cname */
    public const cname = 'cname';
    #[Describe(['nullable' => true])]
    public ?string $cname = null;

    /** @see $protected_domain_state */
    public const protected_domain_state = 'protected_domain_state';
    #[Describe(['nullable' => true])]
    public ?PageProtectedDomainState $protected_domain_state = null;

    /** @see $pending_domain_unverified_at */
    public const pending_domain_unverified_at = 'pending_domain_unverified_at';
    #[Describe(['nullable' => true])]
    public ?string $pending_domain_unverified_at = null;

    /** @see $custom_404 */
    public const custom_404 = 'custom_404';
    #[Describe(['nullable' => true])]
    public ?bool $custom_404 = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $build_type */
    public const build_type = 'build_type';
    #[Describe(['nullable' => true])]
    public ?PageBuildType $build_type = null;

    /** @see $source */
    public const source = 'source';
    #[Describe(['nullable' => true])]
    public ?PagesSourceHash $source = null;

    /** @see $public */
    public const public = 'public';
    #[Describe(['nullable' => true])]
    public ?bool $public = null;

    /** @see $https_certificate */
    public const https_certificate = 'https_certificate';
    #[Describe(['nullable' => true])]
    public ?PagesHttpsCertificate $https_certificate = null;

    /** @see $https_enforced */
    public const https_enforced = 'https_enforced';
    #[Describe(['nullable' => true])]
    public ?bool $https_enforced = null;
}
