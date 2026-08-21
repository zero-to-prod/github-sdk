<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * An export of a codespace. Also, latest export details for a codespace can
 * be fetched with id = latest
 * @link https://docs.github.com/
 */
class CodespaceExportDetails
{
    use DataModel;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?string $state = null;

    /** @see $completed_at */
    public const completed_at = 'completed_at';
    #[Describe(['nullable' => true])]
    public ?string $completed_at = null;

    /** @see $branch */
    public const branch = 'branch';
    #[Describe(['nullable' => true])]
    public ?string $branch = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $export_url */
    public const export_url = 'export_url';
    #[Describe(['nullable' => true])]
    public ?string $export_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;
}
