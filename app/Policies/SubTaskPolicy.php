<?php

namespace App\Policies;

use App\Models\SubTask;
use App\Models\task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SubTaskPolicy
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
    public function view(User $user, SubTask $subTask): bool
    {
         return $user->id === $subTask->task->user_id;
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
    public function update(User $user, SubTask $subtask): bool
    {

        return $user->id === $subtask->task->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SubTask $subtask): bool
    {

        return $user->id === $subtask->task->user_id;
    }

     public function updateChecked(User $user, SubTask $subTask): bool
    {
        return $user->id === $subTask->task->user_id;
    }
}
