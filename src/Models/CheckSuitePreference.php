<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Check suite configuration preferences for a repository.
 * @link https://docs.github.com/
 */
class CheckSuitePreference
{
    use DataModel;

    /** @see $preferences */
    public const preferences = 'preferences';
    #[Describe(['nullable' => true])]
    public ?CheckSuitePreferencePreferences $preferences = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?MinimalRepository $repository = null;
}
