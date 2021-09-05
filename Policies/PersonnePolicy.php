<?php

namespace Modules\BaseCore\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\BaseCore\Models\Personne;
use Modules\BaseCore\Models\User;

class PersonnePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the personne can views any models.
     *
     * @param  Modules\BaseCore\Models\User  $user
     * @return mixed
     */
    public function viewAny(UserEntity $user)
    {
        return $user->hasPermissionTo('list personnes');
    }

    /**
     * Determine whether the personne can views the model.
     *
     * @param  Modules\BaseCore\Models\User  $user
     * @param  Modules\BaseCore\Models\Personne  $model
     * @return mixed
     */
    public function view(UserEntity $user, Personne $model)
    {
        return $user->hasPermissionTo('views personnes');
    }

    /**
     * Determine whether the personne can create models.
     *
     * @param  Modules\BaseCore\Models\User  $user
     * @return mixed
     */
    public function create(UserEntity $user)
    {
        return $user->hasPermissionTo('create personnes');
    }

    /**
     * Determine whether the personne can update the model.
     *
     * @param  Modules\BaseCore\Models\User  $user
     * @param  Modules\BaseCore\Models\Personne  $model
     * @return mixed
     */
    public function update(UserEntity $user, Personne $model)
    {
        return $user->hasPermissionTo('update personnes');
    }

    /**
     * Determine whether the personne can delete the model.
     *
     * @param  Modules\BaseCore\Models\User  $user
     * @param  Modules\BaseCore\Models\Personne  $model
     * @return mixed
     */
    public function delete(UserEntity $user, Personne $model)
    {
        return $user->hasPermissionTo('delete personnes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  Modules\BaseCore\Models\User  $user
     * @param  Modules\BaseCore\Models\Personne  $model
     * @return mixed
     */
    public function deleteAny(UserEntity $user)
    {
        return $user->hasPermissionTo('delete personnes');
    }

    /**
     * Determine whether the personne can restore the model.
     *
     * @param  Modules\BaseCore\Models\User  $user
     * @param  Modules\BaseCore\Models\Personne  $model
     * @return mixed
     */
    public function restore(UserEntity $user, Personne $model)
    {
        return false;
    }

    /**
     * Determine whether the personne can permanently delete the model.
     *
     * @param  Modules\BaseCore\Models\User  $user
     * @param  Modules\BaseCore\Models\Personne  $model
     * @return mixed
     */
    public function forceDelete(UserEntity $user, Personne $model)
    {
        return false;
    }
}
