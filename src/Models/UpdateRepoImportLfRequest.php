<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoImportLfRequest
{
    use DataModel;

    /** @see $use_lfs */
    public const use_lfs = 'use_lfs';
    #[Describe(['default' => UpdateRepoImportLfRequestUseLfs::unknown])]
    public UpdateRepoImportLfRequestUseLfs $use_lfs;
}
