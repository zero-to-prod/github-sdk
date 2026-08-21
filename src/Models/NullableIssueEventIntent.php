<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The intent behind an agent's action on an issue, including the rationale
 * and confidence. Present (and `null` when the event carried no agent
 * intent) on supported event types while the issue suggestions feature is
 * enabled for the repository; the property is omitted entirely when the
 * feature is disabled or the event type does not support intent.
 * @link https://docs.github.com/
 */
class NullableIssueEventIntent
{
    use DataModel;

    /** @see $rationale */
    public const rationale = 'rationale';
    #[Describe(['nullable' => true])]
    public ?string $rationale = null;

    /** @see $confidence */
    public const confidence = 'confidence';
    #[Describe(['nullable' => true])]
    public ?NullableIssueEventIntentConfidence $confidence = null;
}
