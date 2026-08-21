<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Grade for a student or groups GitHub Classroom assignment
 * @link https://docs.github.com/
 */
class ClassroomAssignmentGrade
{
    use DataModel;

    /** @see $assignment_name */
    public const assignment_name = 'assignment_name';
    #[Describe(['nullable' => true])]
    public ?string $assignment_name = null;

    /** @see $assignment_url */
    public const assignment_url = 'assignment_url';
    #[Describe(['nullable' => true])]
    public ?string $assignment_url = null;

    /** @see $starter_code_url */
    public const starter_code_url = 'starter_code_url';
    #[Describe(['nullable' => true])]
    public ?string $starter_code_url = null;

    /** @see $github_username */
    public const github_username = 'github_username';
    #[Describe(['nullable' => true])]
    public ?string $github_username = null;

    /** @see $roster_identifier */
    public const roster_identifier = 'roster_identifier';
    #[Describe(['nullable' => true])]
    public ?string $roster_identifier = null;

    /** @see $student_repository_name */
    public const student_repository_name = 'student_repository_name';
    #[Describe(['nullable' => true])]
    public ?string $student_repository_name = null;

    /** @see $student_repository_url */
    public const student_repository_url = 'student_repository_url';
    #[Describe(['nullable' => true])]
    public ?string $student_repository_url = null;

    /** @see $submission_timestamp */
    public const submission_timestamp = 'submission_timestamp';
    #[Describe(['nullable' => true])]
    public ?string $submission_timestamp = null;

    /** @see $points_awarded */
    public const points_awarded = 'points_awarded';
    #[Describe(['nullable' => true])]
    public ?int $points_awarded = null;

    /** @see $points_available */
    public const points_available = 'points_available';
    #[Describe(['nullable' => true])]
    public ?int $points_available = null;

    /** @see $group_name */
    public const group_name = 'group_name';
    #[Describe(['nullable' => true])]
    public ?string $group_name = null;
}
