<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateAgentRepoTaskRequest
{
    use DataModel;

    /** @see $prompt */
    public const prompt = 'prompt';
    #[Describe(['nullable' => true])]
    public ?string $prompt = null;

    /** @see $model */
    public const model = 'model';
    #[Describe(['nullable' => true])]
    public ?string $model = null;

    /** @see $custom_agent */
    public const custom_agent = 'custom_agent';
    #[Describe(['nullable' => true])]
    public ?string $custom_agent = null;

    /** @see $create_pull_request */
    public const create_pull_request = 'create_pull_request';
    #[Describe(['nullable' => true])]
    public ?bool $create_pull_request = null;

    /** @see $base_ref */
    public const base_ref = 'base_ref';
    #[Describe(['nullable' => true])]
    public ?string $base_ref = null;

    /** @see $head_ref */
    public const head_ref = 'head_ref';
    #[Describe(['nullable' => true])]
    public ?string $head_ref = null;
}
