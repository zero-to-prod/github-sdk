<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Community Profile
 * @link https://docs.github.com/
 */
class CommunityProfile
{
    use DataModel;

    /** @see $health_percentage */
    public const health_percentage = 'health_percentage';
    #[Describe(['nullable' => true])]
    public ?int $health_percentage = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $documentation */
    public const documentation = 'documentation';
    #[Describe(['nullable' => true])]
    public ?string $documentation = null;

    /** @see $files */
    public const files = 'files';
    #[Describe(['nullable' => true])]
    public ?CommunityProfileFiles $files = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $content_reports_enabled */
    public const content_reports_enabled = 'content_reports_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $content_reports_enabled = null;
}
