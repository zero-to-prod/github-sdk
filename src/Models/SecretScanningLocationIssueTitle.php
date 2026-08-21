<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Represents an 'issue_title' secret scanning location type. This location
 * type shows that a secret was detected in the title of an issue.
 * @link https://docs.github.com/
 */
class SecretScanningLocationIssueTitle
{
    use DataModel;

    /** @see $issue_title_url */
    public const issue_title_url = 'issue_title_url';
    #[Describe(['nullable' => true])]
    public ?string $issue_title_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;
}
