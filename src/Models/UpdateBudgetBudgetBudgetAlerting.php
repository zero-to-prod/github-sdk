<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateBudgetBudgetBudgetAlerting
{
    use DataModel;

    /** @see $will_alert */
    public const will_alert = 'will_alert';
    #[Describe(['nullable' => true])]
    public ?bool $will_alert = null;

    /** @see $alert_recipients */
    public const alert_recipients = 'alert_recipients';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $alert_recipients;
}
