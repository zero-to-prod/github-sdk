<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoActionWorkflowDispatchRequest
{
    use DataModel;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;

    /** @see $inputs */
    public const inputs = 'inputs';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $inputs;

    /** @see $return_run_details */
    public const return_run_details = 'return_run_details';
    #[Describe(['nullable' => true])]
    public ?bool $return_run_details = null;
}
