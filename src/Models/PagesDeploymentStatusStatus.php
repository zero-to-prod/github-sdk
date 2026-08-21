<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The current status of the deployment.
 * @link https://docs.github.com/
 */
enum PagesDeploymentStatusStatus: string
{
    case unknown = 'unknown';
    case deployment_in_progress = 'deployment_in_progress';
    case syncing_files = 'syncing_files';
    case finished_file_sync = 'finished_file_sync';
    case updating_pages = 'updating_pages';
    case purging_cdn = 'purging_cdn';
    case deployment_cancelled = 'deployment_cancelled';
    case deployment_failed = 'deployment_failed';
    case deployment_content_failed = 'deployment_content_failed';
    case deployment_attempt_error = 'deployment_attempt_error';
    case deployment_lost = 'deployment_lost';
    case succeed = 'succeed';
}
