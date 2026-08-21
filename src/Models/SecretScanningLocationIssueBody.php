<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Represents an 'issue_body' secret scanning location type. This location
 * type shows that a secret was detected in the body of an issue.
 * @link https://docs.github.com/
 */
class SecretScanningLocationIssueBody
{
    use DataModel;

    /** @see $issue_body_url */
    public const issue_body_url = 'issue_body_url';
    #[Describe(['nullable' => true])]
    public ?string $issue_body_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;
}
