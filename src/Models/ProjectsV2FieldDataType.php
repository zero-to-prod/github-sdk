<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The field's data type.
 * @link https://docs.github.com/
 */
enum ProjectsV2FieldDataType: string
{
    case unknown = 'unknown';
    case assignees = 'assignees';
    case linked_pull_requests = 'linked_pull_requests';
    case reviewers = 'reviewers';
    case labels = 'labels';
    case milestone = 'milestone';
    case repository = 'repository';
    case title = 'title';
    case text = 'text';
    case single_select = 'single_select';
    case number = 'number';
    case date = 'date';
    case iteration = 'iteration';
    case issue_type = 'issue_type';
    case parent_issue = 'parent_issue';
    case sub_issues_progress = 'sub_issues_progress';
}
