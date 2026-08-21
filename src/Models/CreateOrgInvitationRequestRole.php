<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The role for the new member. * `admin` - Organization owners with full
 * administrative rights to the organization and complete access to all
 * repositories and teams. * `direct_member` - Non-owner organization members
 * with ability to see other members and join teams by invitation. *
 * `billing_manager` - Non-owner organization members with ability to manage
 * the billing settings of your organization. * `reinstate` - The previous
 * role assigned to the invitee before they were removed from your
 * organization. Can be one of the roles listed above. Only works if the
 * invitee was previously part of your organization.
 * @link https://docs.github.com/
 */
enum CreateOrgInvitationRequestRole: string
{
    case unknown = 'unknown';
    case admin = 'admin';
    case direct_member = 'direct_member';
    case billing_manager = 'billing_manager';
    case reinstate = 'reinstate';
}
