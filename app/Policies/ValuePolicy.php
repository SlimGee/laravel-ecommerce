<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Value;
use App\Models\User;

class ValuePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view all values');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Value $value)
    {
        return $user->can('view value', $value);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create value');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Value $value)
    {
        return $user->can('update value', $value);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Value $value)
    {
        return $user->can('delete value', $value);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Value $value)
    {
        return $user->can('restore value', $value);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Value $value)
    {
        return $user->can('force delete value', $value);
    }
}
