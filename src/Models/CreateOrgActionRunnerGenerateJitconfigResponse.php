<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgActionRunnerGenerateJitconfigResponse
{
    use DataModel;

    /** @see $runner */
    public const runner = 'runner';
    #[Describe(['nullable' => true])]
    public ?Runner $runner = null;

    /** @see $encoded_jit_config */
    public const encoded_jit_config = 'encoded_jit_config';
    #[Describe(['nullable' => true])]
    public ?string $encoded_jit_config = null;
}
