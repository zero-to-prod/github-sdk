<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Issue Event Project Card
 * @link https://docs.github.com/
 */
class IssueEventProjectCard
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $project_url */
    public const project_url = 'project_url';
    #[Describe(['nullable' => true])]
    public ?string $project_url = null;

    /** @see $project_id */
    public const project_id = 'project_id';
    #[Describe(['nullable' => true])]
    public ?int $project_id = null;

    /** @see $column_name */
    public const column_name = 'column_name';
    #[Describe(['nullable' => true])]
    public ?string $column_name = null;

    /** @see $previous_column_name */
    public const previous_column_name = 'previous_column_name';
    #[Describe(['nullable' => true])]
    public ?string $previous_column_name = null;
}
