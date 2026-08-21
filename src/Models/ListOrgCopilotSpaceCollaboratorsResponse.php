<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgCopilotSpaceCollaboratorsResponse
{
    use DataModel;

    /** @see $collaborators */
    public const collaborators = 'collaborators';
    /** @var array<int, array<string, mixed>> */
    #[Describe(['default' => []])]
    public array $collaborators;
}
