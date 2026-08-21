<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgCopilotSpaceResourceRequest
{
    use DataModel;

    /** @see $metadata */
    public const metadata = 'metadata';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $metadata;
}
