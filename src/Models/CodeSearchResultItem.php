<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Code Search Result Item
 * @link https://docs.github.com/
 */
class CodeSearchResultItem
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $git_url */
    public const git_url = 'git_url';
    #[Describe(['nullable' => true])]
    public ?string $git_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?MinimalRepository $repository = null;

    /** @see $score */
    public const score = 'score';
    #[Describe(['nullable' => true])]
    public ?float $score = null;

    /** @see $file_size */
    public const file_size = 'file_size';
    #[Describe(['nullable' => true])]
    public ?int $file_size = null;

    /** @see $language */
    public const language = 'language';
    #[Describe(['nullable' => true])]
    public ?string $language = null;

    /** @see $last_modified_at */
    public const last_modified_at = 'last_modified_at';
    #[Describe(['nullable' => true])]
    public ?string $last_modified_at = null;

    /** @see $line_numbers */
    public const line_numbers = 'line_numbers';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $line_numbers;

    /** @see $text_matches */
    public const text_matches = 'text_matches';
    /** @var array<int, SearchResultTextMatchesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SearchResultTextMatchesItem::class,
        'default' => [],
    ])]
    public array $text_matches;
}
