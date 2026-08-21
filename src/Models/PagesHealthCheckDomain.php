<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PagesHealthCheckDomain
{
    use DataModel;

    /** @see $host */
    public const host = 'host';
    #[Describe(['nullable' => true])]
    public ?string $host = null;

    /** @see $uri */
    public const uri = 'uri';
    #[Describe(['nullable' => true])]
    public ?string $uri = null;

    /** @see $nameservers */
    public const nameservers = 'nameservers';
    #[Describe(['nullable' => true])]
    public ?string $nameservers = null;

    /** @see $dns_resolves */
    public const dns_resolves = 'dns_resolves';
    #[Describe(['nullable' => true])]
    public ?bool $dns_resolves = null;

    /** @see $is_proxied */
    public const is_proxied = 'is_proxied';
    #[Describe(['nullable' => true])]
    public ?bool $is_proxied = null;

    /** @see $is_cloudflare_ip */
    public const is_cloudflare_ip = 'is_cloudflare_ip';
    #[Describe(['nullable' => true])]
    public ?bool $is_cloudflare_ip = null;

    /** @see $is_fastly_ip */
    public const is_fastly_ip = 'is_fastly_ip';
    #[Describe(['nullable' => true])]
    public ?bool $is_fastly_ip = null;

    /** @see $is_old_ip_address */
    public const is_old_ip_address = 'is_old_ip_address';
    #[Describe(['nullable' => true])]
    public ?bool $is_old_ip_address = null;

    /** @see $is_a_record */
    public const is_a_record = 'is_a_record';
    #[Describe(['nullable' => true])]
    public ?bool $is_a_record = null;

    /** @see $has_cname_record */
    public const has_cname_record = 'has_cname_record';
    #[Describe(['nullable' => true])]
    public ?bool $has_cname_record = null;

    /** @see $has_mx_records_present */
    public const has_mx_records_present = 'has_mx_records_present';
    #[Describe(['nullable' => true])]
    public ?bool $has_mx_records_present = null;

    /** @see $is_valid_domain */
    public const is_valid_domain = 'is_valid_domain';
    #[Describe(['nullable' => true])]
    public ?bool $is_valid_domain = null;

    /** @see $is_apex_domain */
    public const is_apex_domain = 'is_apex_domain';
    #[Describe(['nullable' => true])]
    public ?bool $is_apex_domain = null;

    /** @see $should_be_a_record */
    public const should_be_a_record = 'should_be_a_record';
    #[Describe(['nullable' => true])]
    public ?bool $should_be_a_record = null;

    /** @see $is_cname_to_github_user_domain */
    public const is_cname_to_github_user_domain = 'is_cname_to_github_user_domain';
    #[Describe(['nullable' => true])]
    public ?bool $is_cname_to_github_user_domain = null;

    /** @see $is_cname_to_pages_dot_github_dot_com */
    public const is_cname_to_pages_dot_github_dot_com = 'is_cname_to_pages_dot_github_dot_com';
    #[Describe(['nullable' => true])]
    public ?bool $is_cname_to_pages_dot_github_dot_com = null;

    /** @see $is_cname_to_fastly */
    public const is_cname_to_fastly = 'is_cname_to_fastly';
    #[Describe(['nullable' => true])]
    public ?bool $is_cname_to_fastly = null;

    /** @see $is_pointed_to_github_pages_ip */
    public const is_pointed_to_github_pages_ip = 'is_pointed_to_github_pages_ip';
    #[Describe(['nullable' => true])]
    public ?bool $is_pointed_to_github_pages_ip = null;

    /** @see $is_non_github_pages_ip_present */
    public const is_non_github_pages_ip_present = 'is_non_github_pages_ip_present';
    #[Describe(['nullable' => true])]
    public ?bool $is_non_github_pages_ip_present = null;

    /** @see $is_pages_domain */
    public const is_pages_domain = 'is_pages_domain';
    #[Describe(['nullable' => true])]
    public ?bool $is_pages_domain = null;

    /** @see $is_served_by_pages */
    public const is_served_by_pages = 'is_served_by_pages';
    #[Describe(['nullable' => true])]
    public ?bool $is_served_by_pages = null;

    /** @see $is_valid */
    public const is_valid = 'is_valid';
    #[Describe(['nullable' => true])]
    public ?bool $is_valid = null;

    /** @see $reason */
    public const reason = 'reason';
    #[Describe(['nullable' => true])]
    public ?string $reason = null;

    /** @see $responds_to_https */
    public const responds_to_https = 'responds_to_https';
    #[Describe(['nullable' => true])]
    public ?bool $responds_to_https = null;

    /** @see $enforces_https */
    public const enforces_https = 'enforces_https';
    #[Describe(['nullable' => true])]
    public ?bool $enforces_https = null;

    /** @see $https_error */
    public const https_error = 'https_error';
    #[Describe(['nullable' => true])]
    public ?string $https_error = null;

    /** @see $is_https_eligible */
    public const is_https_eligible = 'is_https_eligible';
    #[Describe(['nullable' => true])]
    public ?bool $is_https_eligible = null;

    /** @see $caa_error */
    public const caa_error = 'caa_error';
    #[Describe(['nullable' => true])]
    public ?string $caa_error = null;
}
