<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GollumEventPagesItem
{
    use DataModel;

    /** @see $page_name */
    public const page_name = 'page_name';
    #[Describe(['nullable' => true])]
    public ?string $page_name = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $summary */
    public const summary = 'summary';
    #[Describe(['nullable' => true])]
    public ?string $summary = null;

    /** @see $action */
    public const action = 'action';
    #[Describe(['nullable' => true])]
    public ?string $action = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;
}
