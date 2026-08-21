<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoDeploymentRequest
{
    use DataModel;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;

    /** @see $task */
    public const task = 'task';
    #[Describe(['nullable' => true])]
    public ?string $task = null;

    /** @see $auto_merge */
    public const auto_merge = 'auto_merge';
    #[Describe(['nullable' => true])]
    public ?bool $auto_merge = null;

    /** @see $required_contexts */
    public const required_contexts = 'required_contexts';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $required_contexts;

    /** @see $payload */
    public const payload = 'payload';
    #[Describe(['nullable' => true])]
    public array|string|null $payload = null;

    /** @see $environment */
    public const environment = 'environment';
    #[Describe(['nullable' => true])]
    public ?string $environment = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $transient_environment */
    public const transient_environment = 'transient_environment';
    #[Describe(['nullable' => true])]
    public ?bool $transient_environment = null;

    /** @see $production_environment */
    public const production_environment = 'production_environment';
    #[Describe(['nullable' => true])]
    public ?bool $production_environment = null;
}
