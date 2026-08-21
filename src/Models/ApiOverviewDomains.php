<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ApiOverviewDomains
{
    use DataModel;

    /** @see $website */
    public const website = 'website';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $website;

    /** @see $codespaces */
    public const codespaces = 'codespaces';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $codespaces;

    /** @see $copilot */
    public const copilot = 'copilot';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $copilot;

    /** @see $packages */
    public const packages = 'packages';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $packages;

    /** @see $storage */
    public const storage = 'storage';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $storage;

    /** @see $actions */
    public const actions = 'actions';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $actions;

    /** @see $actions_inbound */
    public const actions_inbound = 'actions_inbound';
    #[Describe(['nullable' => true])]
    public ?ApiOverviewDomainsActionsInbound $actions_inbound = null;

    /** @see $artifact_attestations */
    public const artifact_attestations = 'artifact_attestations';
    #[Describe(['nullable' => true])]
    public ?ApiOverviewDomainsArtifactAttestations $artifact_attestations = null;
}
