<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A field inside a projects v2 project
 * @link https://docs.github.com/
 */
class ProjectsV2Field
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $issue_field_id */
    public const issue_field_id = 'issue_field_id';
    #[Describe(['nullable' => true])]
    public ?int $issue_field_id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $project_url */
    public const project_url = 'project_url';
    #[Describe(['nullable' => true])]
    public ?string $project_url = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $data_type */
    public const data_type = 'data_type';
    #[Describe(['default' => ProjectsV2FieldDataType::unknown])]
    public ProjectsV2FieldDataType $data_type;

    /** @see $options */
    public const options = 'options';
    /** @var array<int, ProjectsV2SingleSelectOptions> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ProjectsV2SingleSelectOptions::class,
        'default' => [],
    ])]
    public array $options;

    /** @see $configuration */
    public const configuration = 'configuration';
    #[Describe(['nullable' => true])]
    public ?ProjectsV2FieldConfiguration $configuration = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
