<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Api Overview
 * @link https://docs.github.com/
 */
class ApiOverview
{
    use DataModel;

    /** @see $verifiable_password_authentication */
    public const verifiable_password_authentication = 'verifiable_password_authentication';
    #[Describe(['nullable' => true])]
    public ?bool $verifiable_password_authentication = null;

    /** @see $ssh_key_fingerprints */
    public const ssh_key_fingerprints = 'ssh_key_fingerprints';
    #[Describe(['nullable' => true])]
    public ?ApiOverviewSshKeyFingerprints $ssh_key_fingerprints = null;

    /** @see $ssh_keys */
    public const ssh_keys = 'ssh_keys';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $ssh_keys;

    /** @see $hooks */
    public const hooks = 'hooks';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $hooks;

    /** @see $github_enterprise_importer */
    public const github_enterprise_importer = 'github_enterprise_importer';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $github_enterprise_importer;

    /** @see $web */
    public const web = 'web';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $web;

    /** @see $api */
    public const api = 'api';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $api;

    /** @see $git */
    public const git = 'git';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $git;

    /** @see $packages */
    public const packages = 'packages';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $packages;

    /** @see $pages */
    public const pages = 'pages';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $pages;

    /** @see $importer */
    public const importer = 'importer';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $importer;

    /** @see $actions */
    public const actions = 'actions';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $actions;

    /** @see $actions_macos */
    public const actions_macos = 'actions_macos';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $actions_macos;

    /** @see $codespaces */
    public const codespaces = 'codespaces';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $codespaces;

    /** @see $dependabot */
    public const dependabot = 'dependabot';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $dependabot;

    /** @see $copilot */
    public const copilot = 'copilot';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $copilot;

    /** @see $commit_signing_keys */
    public const commit_signing_keys = 'commit_signing_keys';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $commit_signing_keys;

    /** @see $domains */
    public const domains = 'domains';
    #[Describe(['nullable' => true])]
    public ?ApiOverviewDomains $domains = null;
}
