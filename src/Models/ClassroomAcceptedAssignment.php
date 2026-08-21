<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A GitHub Classroom accepted assignment
 * @link https://docs.github.com/
 */
class ClassroomAcceptedAssignment
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $submitted */
    public const submitted = 'submitted';
    #[Describe(['nullable' => true])]
    public ?bool $submitted = null;

    /** @see $passing */
    public const passing = 'passing';
    #[Describe(['nullable' => true])]
    public ?bool $passing = null;

    /** @see $commit_count */
    public const commit_count = 'commit_count';
    #[Describe(['nullable' => true])]
    public ?int $commit_count = null;

    /** @see $grade */
    public const grade = 'grade';
    #[Describe(['nullable' => true])]
    public ?string $grade = null;

    /** @see $students */
    public const students = 'students';
    /** @var array<int, SimpleClassroomUser> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SimpleClassroomUser::class,
        'default' => [],
    ])]
    public array $students;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?SimpleClassroomRepository $repository = null;

    /** @see $assignment */
    public const assignment = 'assignment';
    #[Describe(['nullable' => true])]
    public ?SimpleClassroomAssignment $assignment = null;
}
