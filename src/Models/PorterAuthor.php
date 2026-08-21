<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Porter Author
 * @link https://docs.github.com/
 */
class PorterAuthor
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $remote_id */
    public const remote_id = 'remote_id';
    #[Describe(['nullable' => true])]
    public ?string $remote_id = null;

    /** @see $remote_name */
    public const remote_name = 'remote_name';
    #[Describe(['nullable' => true])]
    public ?string $remote_name = null;

    /** @see $email */
    public const email = 'email';
    #[Describe(['nullable' => true])]
    public ?string $email = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $import_url */
    public const import_url = 'import_url';
    #[Describe(['nullable' => true])]
    public ?string $import_url = null;
}
