<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A GitHub repository view for Classroom
 * @link https://docs.github.com/
 */
class SimpleClassroomRepository
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $full_name */
    public const full_name = 'full_name';
    #[Describe(['nullable' => true])]
    public ?string $full_name = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $private */
    public const private = 'private';
    #[Describe(['nullable' => true])]
    public ?bool $private = null;

    /** @see $default_branch */
    public const default_branch = 'default_branch';
    #[Describe(['nullable' => true])]
    public ?string $default_branch = null;
}
