<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoCheckSuitePreferenceRequestAutoTriggerChecksItem
{
    use DataModel;

    /** @see $app_id */
    public const app_id = 'app_id';
    #[Describe(['nullable' => true])]
    public ?int $app_id = null;

    /** @see $setting */
    public const setting = 'setting';
    #[Describe(['nullable' => true])]
    public ?bool $setting = null;
}
