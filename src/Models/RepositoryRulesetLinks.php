<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class RepositoryRulesetLinks
{
    use DataModel;

    /** @see $self */
    public const self = 'self';
    #[Describe(['nullable' => true])]
    public ?RepositoryRulesetLinksSelf $self = null;

    /** @see $html */
    public const html = 'html';
    #[Describe(['nullable' => true])]
    public ?RepositoryRulesetLinksHtml $html = null;
}
