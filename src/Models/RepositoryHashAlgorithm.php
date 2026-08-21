<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Repository hash algorithm
 * @link https://docs.github.com/
 */
class RepositoryHashAlgorithm
{
    use DataModel;

    /** @see $hash_algorithm */
    public const hash_algorithm = 'hash_algorithm';
    #[Describe(['default' => RepositoryHashAlgorithmHashAlgorithm::unknown])]
    public RepositoryHashAlgorithmHashAlgorithm $hash_algorithm;
}
