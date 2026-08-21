<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateGistRequest
{
    use DataModel;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $files */
    public const files = 'files';
    /** @var array<string, CreateGistRequestFilesValue> */
    #[Describe(['default' => []])]
    public array $files;

    /** @see $public */
    public const public = 'public';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $public;
}
