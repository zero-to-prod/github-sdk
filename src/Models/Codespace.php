<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A codespace.
 * @link https://docs.github.com/
 */
class Codespace
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $display_name */
    public const display_name = 'display_name';
    #[Describe(['nullable' => true])]
    public ?string $display_name = null;

    /** @see $environment_id */
    public const environment_id = 'environment_id';
    #[Describe(['nullable' => true])]
    public ?string $environment_id = null;

    /** @see $owner */
    public const owner = 'owner';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $owner = null;

    /** @see $billable_owner */
    public const billable_owner = 'billable_owner';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $billable_owner = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?MinimalRepository $repository = null;

    /** @see $machine */
    public const machine = 'machine';
    #[Describe(['nullable' => true])]
    public ?CodespaceMachine $machine = null;

    /** @see $devcontainer_path */
    public const devcontainer_path = 'devcontainer_path';
    #[Describe(['nullable' => true])]
    public ?string $devcontainer_path = null;

    /** @see $prebuild */
    public const prebuild = 'prebuild';
    #[Describe(['nullable' => true])]
    public ?bool $prebuild = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $last_used_at */
    public const last_used_at = 'last_used_at';
    #[Describe(['nullable' => true])]
    public ?string $last_used_at = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => CodespaceState::unknown])]
    public CodespaceState $state;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $git_status */
    public const git_status = 'git_status';
    #[Describe(['nullable' => true])]
    public ?CodespaceGitStatus $git_status = null;

    /** @see $location */
    public const location = 'location';
    #[Describe(['default' => CodespaceLocation::unknown])]
    public CodespaceLocation $location;

    /** @see $idle_timeout_minutes */
    public const idle_timeout_minutes = 'idle_timeout_minutes';
    #[Describe(['nullable' => true])]
    public ?int $idle_timeout_minutes = null;

    /** @see $web_url */
    public const web_url = 'web_url';
    #[Describe(['nullable' => true])]
    public ?string $web_url = null;

    /** @see $machines_url */
    public const machines_url = 'machines_url';
    #[Describe(['nullable' => true])]
    public ?string $machines_url = null;

    /** @see $start_url */
    public const start_url = 'start_url';
    #[Describe(['nullable' => true])]
    public ?string $start_url = null;

    /** @see $stop_url */
    public const stop_url = 'stop_url';
    #[Describe(['nullable' => true])]
    public ?string $stop_url = null;

    /** @see $publish_url */
    public const publish_url = 'publish_url';
    #[Describe(['nullable' => true])]
    public ?string $publish_url = null;

    /** @see $pulls_url */
    public const pulls_url = 'pulls_url';
    #[Describe(['nullable' => true])]
    public ?string $pulls_url = null;

    /** @see $recent_folders */
    public const recent_folders = 'recent_folders';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $recent_folders;

    /** @see $runtime_constraints */
    public const runtime_constraints = 'runtime_constraints';
    #[Describe(['nullable' => true])]
    public ?CodespaceRuntimeConstraints $runtime_constraints = null;

    /** @see $pending_operation */
    public const pending_operation = 'pending_operation';
    #[Describe(['nullable' => true])]
    public ?bool $pending_operation = null;

    /** @see $pending_operation_disabled_reason */
    public const pending_operation_disabled_reason = 'pending_operation_disabled_reason';
    #[Describe(['nullable' => true])]
    public ?string $pending_operation_disabled_reason = null;

    /** @see $idle_timeout_notice */
    public const idle_timeout_notice = 'idle_timeout_notice';
    #[Describe(['nullable' => true])]
    public ?string $idle_timeout_notice = null;

    /** @see $retention_period_minutes */
    public const retention_period_minutes = 'retention_period_minutes';
    #[Describe(['nullable' => true])]
    public ?int $retention_period_minutes = null;

    /** @see $retention_expires_at */
    public const retention_expires_at = 'retention_expires_at';
    #[Describe(['nullable' => true])]
    public ?string $retention_expires_at = null;

    /** @see $last_known_stop_notice */
    public const last_known_stop_notice = 'last_known_stop_notice';
    #[Describe(['nullable' => true])]
    public ?string $last_known_stop_notice = null;
}
