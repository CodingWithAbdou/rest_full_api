<?php

namespace App\Policies;

use App\Models\User;
use App\Models\lesson;
use Illuminate\Auth\Access\Response;

class LessonPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, lesson $lesson)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, lesson $lesson)
    {
        return $user->role == 'admin' || $user->id == $lesson->user_id  ?
        Response::allow() :
        Response::deny("You Don't Have Permission For Delete This Acount");

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, lesson $lesson)
    {
        return $user->role == 'admin' || $user->id == $lesson->user_id  ?
        Response::allow() :
        Response::deny("You Don't Have Permission For Delete This Acount");

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, lesson $lesson)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, lesson $lesson)
    {
        //
    }
}
