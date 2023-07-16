<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Varation;
use App\Models\User;

class VarationPolicy
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
        return $user->can('view all varations');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Varation  $varation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Varation $varation)
    {
        return $user->can('view varation', $varation);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create varation');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Varation  $varation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Varation $varation)
    {
        return $user->can('update varation', $varation);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Varation  $varation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Varation $varation)
    {
        return $user->can('delete varation', $varation);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Varation  $varation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Varation $varation)
    {
        return $user->can('restore varation', $varation);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Varation  $varation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Varation $varation)
    {
        return $user->can('force delete varation', $varation);
    }
}
