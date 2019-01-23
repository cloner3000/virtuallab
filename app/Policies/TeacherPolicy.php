<?php

namespace App\Policies;

use App\Teacher;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class TeacherPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return Gate::any(['viewTeacher', 'manageTeacher'], $user);
    }

    /**
     * @param User $user
     * @param Teacher $teacher
     * @return bool
     */
    public function view(User $user, Teacher $teacher)
    {
        return Gate::any(['viewTeacher', 'manageTeacher'], [$user, $teacher]);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('manageTeacher');
    }

    /**
     * @param User $user
     * @param Teacher $teacher
     * @return bool
     */
    public function update(User $user, Teacher $teacher)
    {
        return $user->can('manageTeacher', $teacher);
    }

    /**
     * @param User $user
     * @param Teacher $teacher
     * @return bool
     */
    public function delete(User $user, Teacher $teacher)
    {
        return $user->can('manageTeacher', $teacher);
    }

    /**
     * @param User $user
     * @param Teacher $teacher
     * @return bool
     */
    public function restore(User $user, Teacher $teacher)
    {
        return $user->can('manageTeacher', $teacher);
    }

    /**
     * @param User $user
     * @param Teacher $teacher
     * @return bool
     */
    public function forceDelete(User $user, Teacher $teacher)
    {
        return $user->can('manageTeacher', $teacher);
    }
}
