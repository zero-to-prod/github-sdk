<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * An item belonging to a project
 * @link https://docs.github.com/
 */
class ProjectsV2ItemSimple
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?float $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $content */
    public const content = 'content';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $content;

    /** @see $content_type */
    public const content_type = 'content_type';
    #[Describe(['default' => ProjectsV2ItemContentType::unknown])]
    public ProjectsV2ItemContentType $content_type;

    /** @see $creator */
    public const creator = 'creator';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $creator = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $archived_at */
    public const archived_at = 'archived_at';
    #[Describe(['nullable' => true])]
    public ?string $archived_at = null;

    /** @see $project_url */
    public const project_url = 'project_url';
    #[Describe(['nullable' => true])]
    public ?string $project_url = null;

    /** @see $item_url */
    public const item_url = 'item_url';
    #[Describe(['nullable' => true])]
    public ?string $item_url = null;
}
