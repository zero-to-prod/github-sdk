<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class SecretScanningAlert
{
    use DataModel;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $locations_url */
    public const locations_url = 'locations_url';
    #[Describe(['nullable' => true])]
    public ?string $locations_url = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?SecretScanningAlertState $state = null;

    /** @see $resolution */
    public const resolution = 'resolution';
    #[Describe(['nullable' => true])]
    public ?SecretScanningAlertResolution $resolution = null;

    /** @see $resolved_at */
    public const resolved_at = 'resolved_at';
    #[Describe(['nullable' => true])]
    public ?string $resolved_at = null;

    /** @see $resolved_by */
    public const resolved_by = 'resolved_by';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $resolved_by = null;

    /** @see $resolution_comment */
    public const resolution_comment = 'resolution_comment';
    #[Describe(['nullable' => true])]
    public ?string $resolution_comment = null;

    /** @see $secret_type */
    public const secret_type = 'secret_type';
    #[Describe(['nullable' => true])]
    public ?string $secret_type = null;

    /** @see $secret_type_display_name */
    public const secret_type_display_name = 'secret_type_display_name';
    #[Describe(['nullable' => true])]
    public ?string $secret_type_display_name = null;

    /** @see $provider */
    public const provider = 'provider';
    #[Describe(['nullable' => true])]
    public ?string $provider = null;

    /** @see $provider_slug */
    public const provider_slug = 'provider_slug';
    #[Describe(['nullable' => true])]
    public ?string $provider_slug = null;

    /** @see $secret */
    public const secret = 'secret';
    #[Describe(['nullable' => true])]
    public ?string $secret = null;

    /** @see $push_protection_bypassed */
    public const push_protection_bypassed = 'push_protection_bypassed';
    #[Describe(['nullable' => true])]
    public ?bool $push_protection_bypassed = null;

    /** @see $push_protection_bypassed_by */
    public const push_protection_bypassed_by = 'push_protection_bypassed_by';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $push_protection_bypassed_by = null;

    /** @see $push_protection_bypassed_at */
    public const push_protection_bypassed_at = 'push_protection_bypassed_at';
    #[Describe(['nullable' => true])]
    public ?string $push_protection_bypassed_at = null;

    /** @see $push_protection_bypass_request_reviewer */
    public const push_protection_bypass_request_reviewer = 'push_protection_bypass_request_reviewer';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $push_protection_bypass_request_reviewer = null;

    /** @see $push_protection_bypass_request_reviewer_comment */
    public const push_protection_bypass_request_reviewer_comment = 'push_protection_bypass_request_reviewer_comment';
    #[Describe(['nullable' => true])]
    public ?string $push_protection_bypass_request_reviewer_comment = null;

    /** @see $push_protection_bypass_request_comment */
    public const push_protection_bypass_request_comment = 'push_protection_bypass_request_comment';
    #[Describe(['nullable' => true])]
    public ?string $push_protection_bypass_request_comment = null;

    /** @see $push_protection_bypass_request_html_url */
    public const push_protection_bypass_request_html_url = 'push_protection_bypass_request_html_url';
    #[Describe(['nullable' => true])]
    public ?string $push_protection_bypass_request_html_url = null;

    /** @see $validity */
    public const validity = 'validity';
    #[Describe(['nullable' => true])]
    public ?OrganizationSecretScanningAlertValidity $validity = null;

    /** @see $publicly_leaked */
    public const publicly_leaked = 'publicly_leaked';
    #[Describe(['nullable' => true])]
    public ?bool $publicly_leaked = null;

    /** @see $multi_repo */
    public const multi_repo = 'multi_repo';
    #[Describe(['nullable' => true])]
    public ?bool $multi_repo = null;

    /** @see $is_base64_encoded */
    public const is_base64_encoded = 'is_base64_encoded';
    #[Describe(['nullable' => true])]
    public ?bool $is_base64_encoded = null;

    /** @see $first_location_detected */
    public const first_location_detected = 'first_location_detected';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $first_location_detected;

    /** @see $has_more_locations */
    public const has_more_locations = 'has_more_locations';
    #[Describe(['nullable' => true])]
    public ?bool $has_more_locations = null;

    /** @see $assigned_to */
    public const assigned_to = 'assigned_to';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $assigned_to = null;

    /** @see $closure_request_comment */
    public const closure_request_comment = 'closure_request_comment';
    #[Describe(['nullable' => true])]
    public ?string $closure_request_comment = null;

    /** @see $closure_request_reviewer_comment */
    public const closure_request_reviewer_comment = 'closure_request_reviewer_comment';
    #[Describe(['nullable' => true])]
    public ?string $closure_request_reviewer_comment = null;

    /** @see $closure_request_reviewer */
    public const closure_request_reviewer = 'closure_request_reviewer';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $closure_request_reviewer = null;
}
