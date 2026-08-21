<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CommunityProfileFiles
{
    use DataModel;

    /** @see $code_of_conduct */
    public const code_of_conduct = 'code_of_conduct';
    #[Describe(['nullable' => true])]
    public ?CodeOfConductSimple $code_of_conduct = null;

    /** @see $code_of_conduct_file */
    public const code_of_conduct_file = 'code_of_conduct_file';
    #[Describe(['nullable' => true])]
    public ?NullableCommunityHealthFile $code_of_conduct_file = null;

    /** @see $license */
    public const license = 'license';
    #[Describe(['nullable' => true])]
    public ?LicenseSimple $license = null;

    /** @see $contributing */
    public const contributing = 'contributing';
    #[Describe(['nullable' => true])]
    public ?NullableCommunityHealthFile $contributing = null;

    /** @see $readme */
    public const readme = 'readme';
    #[Describe(['nullable' => true])]
    public ?NullableCommunityHealthFile $readme = null;

    /** @see $issue_template */
    public const issue_template = 'issue_template';
    #[Describe(['nullable' => true])]
    public ?NullableCommunityHealthFile $issue_template = null;

    /** @see $pull_request_template */
    public const pull_request_template = 'pull_request_template';
    #[Describe(['nullable' => true])]
    public ?NullableCommunityHealthFile $pull_request_template = null;
}
