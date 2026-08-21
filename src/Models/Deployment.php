<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A request for a specific ref(branch,sha,tag) to be deployed
 * @link https://docs.github.com/
 */
class Deployment
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

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;

    /** @see $task */
    public const task = 'task';
    #[Describe(['nullable' => true])]
    public ?string $task = null;

    /** @see $payload */
    public const payload = 'payload';
    #[Describe(['nullable' => true])]
    public array|string|null $payload = null;

    /** @see $original_environment */
    public const original_environment = 'original_environment';
    #[Describe(['nullable' => true])]
    public ?string $original_environment = null;

    /** @see $environment */
    public const environment = 'environment';
    #[Describe(['nullable' => true])]
    public ?string $environment = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

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

    /** @see $statuses_url */
    public const statuses_url = 'statuses_url';
    #[Describe(['nullable' => true])]
    public ?string $statuses_url = null;

    /** @see $repository_url */
    public const repository_url = 'repository_url';
    #[Describe(['nullable' => true])]
    public ?string $repository_url = null;

    /** @see $transient_environment */
    public const transient_environment = 'transient_environment';
    #[Describe(['nullable' => true])]
    public ?bool $transient_environment = null;

    /** @see $production_environment */
    public const production_environment = 'production_environment';
    #[Describe(['nullable' => true])]
    public ?bool $production_environment = null;

    /** @see $performed_via_github_app */
    public const performed_via_github_app = 'performed_via_github_app';
    #[Describe(['nullable' => true])]
    public ?Integration $performed_via_github_app = null;
}
