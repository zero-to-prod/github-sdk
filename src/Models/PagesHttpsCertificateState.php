<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum PagesHttpsCertificateState: string
{
    case unknown = 'unknown';
    case new = 'new';
    case authorization_created = 'authorization_created';
    case authorization_pending = 'authorization_pending';
    case authorized = 'authorized';
    case authorization_revoked = 'authorization_revoked';
    case issued = 'issued';
    case uploaded = 'uploaded';
    case approved = 'approved';
    case errored = 'errored';
    case bad_authz = 'bad_authz';
    case destroy_pending = 'destroy_pending';
    case dns_changed = 'dns_changed';
}
