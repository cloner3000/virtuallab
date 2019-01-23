<?php

namespace App\Policies;

use App\Student;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class StudentPolicy
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
        return Gate::any(['viewStudent', 'manageStudent'], $user);
    }

    /**
     * @param User $user
     * @param Student $student
     * @return bool
     */
    public function view(User $user, Student $student)
    {
        return Gate::any(['viewStudent', 'manageStudent'], [$user, $student]);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('manageStudent');
    }

    /**
     * @param User $user
     * @param Student $student
     * @return bool
     */
    public function update(User $user, Student $student)
    {
        return $user->can('manageStudent', $student);
    }

    /**
     * @param User $user
     * @param Student $student
     * @return bool
     */
    public function delete(User $user, Student $student)
    {
        return $user->can('manageStudent', $student);
    }

    /**
     * @param User $user
     * @param Student $student
     * @return bool
     */
    public function restore(User $user, Student $student)
    {
        return $user->can('manageStudent', $student);
    }

    /**
     * @param User $user
     * @param Student $student
     * @return bool
     */
    public function forceDelete(User $user, Student $student)
    {
        return $user->can('manageStudent', $student);
    }
}
