<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Create a new snapshot of a repository's dependencies.
 * @link https://docs.github.com/
 */
class Snapshot
{
    use DataModel;

    /** @see $version */
    public const version = 'version';
    #[Describe(['nullable' => true])]
    public ?int $version = null;

    /** @see $job */
    public const job = 'job';
    #[Describe(['nullable' => true])]
    public ?SnapshotJob $job = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;

    /** @see $detector */
    public const detector = 'detector';
    #[Describe(['nullable' => true])]
    public ?SnapshotDetector $detector = null;

    /** @see $metadata */
    public const metadata = 'metadata';
    /** @var array<string, string|float|bool> */
    #[Describe(['default' => []])]
    public array $metadata;

    /** @see $manifests */
    public const manifests = 'manifests';
    /** @var array<string, Manifest> */
    #[Describe(['default' => []])]
    public array $manifests;

    /** @see $scanned */
    public const scanned = 'scanned';
    #[Describe(['nullable' => true])]
    public ?string $scanned = null;
}
