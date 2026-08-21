<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A GitHub Actions workflow
 * @link https://docs.github.com/
 */
class Workflow
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => WorkflowState::unknown])]
    public WorkflowState $state;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $badge_url */
    public const badge_url = 'badge_url';
    #[Describe(['nullable' => true])]
    public ?string $badge_url = null;

    /** @see $deleted_at */
    public const deleted_at = 'deleted_at';
    #[Describe(['nullable' => true])]
    public ?string $deleted_at = null;
}
