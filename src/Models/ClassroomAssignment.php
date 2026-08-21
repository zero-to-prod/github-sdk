<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A GitHub Classroom assignment
 * @link https://docs.github.com/
 */
class ClassroomAssignment
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $public_repo */
    public const public_repo = 'public_repo';
    #[Describe(['nullable' => true])]
    public ?bool $public_repo = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['default' => ClassroomAssignmentType::unknown])]
    public ClassroomAssignmentType $type;

    /** @see $invite_link */
    public const invite_link = 'invite_link';
    #[Describe(['nullable' => true])]
    public ?string $invite_link = null;

    /** @see $invitations_enabled */
    public const invitations_enabled = 'invitations_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $invitations_enabled = null;

    /** @see $slug */
    public const slug = 'slug';
    #[Describe(['nullable' => true])]
    public ?string $slug = null;

    /** @see $students_are_repo_admins */
    public const students_are_repo_admins = 'students_are_repo_admins';
    #[Describe(['nullable' => true])]
    public ?bool $students_are_repo_admins = null;

    /** @see $feedback_pull_requests_enabled */
    public const feedback_pull_requests_enabled = 'feedback_pull_requests_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $feedback_pull_requests_enabled = null;

    /** @see $max_teams */
    public const max_teams = 'max_teams';
    #[Describe(['nullable' => true])]
    public ?int $max_teams = null;

    /** @see $max_members */
    public const max_members = 'max_members';
    #[Describe(['nullable' => true])]
    public ?int $max_members = null;

    /** @see $editor */
    public const editor = 'editor';
    #[Describe(['nullable' => true])]
    public ?string $editor = null;

    /** @see $accepted */
    public const accepted = 'accepted';
    #[Describe(['nullable' => true])]
    public ?int $accepted = null;

    /** @see $submitted */
    public const submitted = 'submitted';
    #[Describe(['nullable' => true])]
    public ?int $submitted = null;

    /** @see $passing */
    public const passing = 'passing';
    #[Describe(['nullable' => true])]
    public ?int $passing = null;

    /** @see $language */
    public const language = 'language';
    #[Describe(['nullable' => true])]
    public ?string $language = null;

    /** @see $deadline */
    public const deadline = 'deadline';
    #[Describe(['nullable' => true])]
    public ?string $deadline = null;

    /** @see $starter_code_repository */
    public const starter_code_repository = 'starter_code_repository';
    #[Describe(['nullable' => true])]
    public ?SimpleClassroomRepository $starter_code_repository = null;

    /** @see $classroom */
    public const classroom = 'classroom';
    #[Describe(['nullable' => true])]
    public ?Classroom $classroom = null;
}
