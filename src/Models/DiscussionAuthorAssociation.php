<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * How the author is associated with the repository.
 * @link https://docs.github.com/
 */
enum DiscussionAuthorAssociation: string
{
    case unknown = 'unknown';
    case COLLABORATOR = 'COLLABORATOR';
    case CONTRIBUTOR = 'CONTRIBUTOR';
    case FIRST_TIMER = 'FIRST_TIMER';
    case FIRST_TIME_CONTRIBUTOR = 'FIRST_TIME_CONTRIBUTOR';
    case MANNEQUIN = 'MANNEQUIN';
    case MEMBER = 'MEMBER';
    case NONE = 'NONE';
    case OWNER = 'OWNER';
}
