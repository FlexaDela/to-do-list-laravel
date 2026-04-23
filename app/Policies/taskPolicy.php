<?php

namespace App\Policies;

use App\Models\User;
use App\Models\task;
use Illuminate\Auth\Access\Response;

class taskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, task $task): bool
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, task $task): bool
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, task $task): bool
    {
        return $user->id === $task->user_id;
    }


    public function updateChecked(User $user, task $task): bool
    {
        return $user->id === $task->user_id;
    }

}
