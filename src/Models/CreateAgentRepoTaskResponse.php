<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateAgentRepoTaskResponse
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $creator */
    public const creator = 'creator';
    #[Describe(['nullable' => true])]
    public ?CreateAgentRepoTaskResponseCreatorVariant1 $creator = null;

    /** @see $creator_type */
    public const creator_type = 'creator_type';
    #[Describe(['nullable' => true])]
    public ?ListAgentRepoTasksResponseTasksItemCreatorType $creator_type = null;

    /** @see $user_collaborators */
    public const user_collaborators = 'user_collaborators';
    /** @var array<int, CreateAgentRepoTaskResponseUserCollaboratorsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CreateAgentRepoTaskResponseUserCollaboratorsItem::class,
        'default' => [],
    ])]
    public array $user_collaborators;

    /** @see $owner */
    public const owner = 'owner';
    #[Describe(['nullable' => true])]
    public ?CreateAgentRepoTaskResponseOwner $owner = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?CreateAgentRepoTaskResponseRepository $repository = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => ListAgentRepoTasksResponseTasksItemState::unknown])]
    public ListAgentRepoTasksResponseTasksItemState $state;

    /** @see $session_count */
    public const session_count = 'session_count';
    #[Describe(['nullable' => true])]
    public ?int $session_count = null;

    /** @see $artifacts */
    public const artifacts = 'artifacts';
    /** @var array<int, CreateAgentRepoTaskResponseArtifactsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CreateAgentRepoTaskResponseArtifactsItem::class,
        'default' => [],
    ])]
    public array $artifacts;

    /** @see $archived_at */
    public const archived_at = 'archived_at';
    #[Describe(['nullable' => true])]
    public ?string $archived_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $custom_agent */
    public const custom_agent = 'custom_agent';
    #[Describe(['nullable' => true])]
    public ?CreateAgentRepoTaskResponseCustomAgent $custom_agent = null;
}
