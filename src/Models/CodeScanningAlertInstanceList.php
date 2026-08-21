<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CodeScanningAlertInstanceList
{
    use DataModel;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;

    /** @see $analysis_key */
    public const analysis_key = 'analysis_key';
    #[Describe(['nullable' => true])]
    public ?string $analysis_key = null;

    /** @see $environment */
    public const environment = 'environment';
    #[Describe(['nullable' => true])]
    public ?string $environment = null;

    /** @see $category */
    public const category = 'category';
    #[Describe(['nullable' => true])]
    public ?string $category = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?CodeScanningAlertInstanceState $state = null;

    /** @see $commit_sha */
    public const commit_sha = 'commit_sha';
    #[Describe(['nullable' => true])]
    public ?string $commit_sha = null;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?CodeScanningAlertInstanceListMessage $message = null;

    /** @see $location */
    public const location = 'location';
    #[Describe(['nullable' => true])]
    public ?CodeScanningAlertLocation $location = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $classifications */
    public const classifications = 'classifications';
    /** @var array<int, CodeScanningAlertClassification|null> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CodeScanningAlertClassification::class,
        'method' => 'tryFrom',
        'default' => [],
    ])]
    public array $classifications;
}
