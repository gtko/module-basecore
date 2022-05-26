<?php

namespace Modules\BaseCore\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\BaseCore\Contracts\Entities\UserEntity;
use Modules\BaseCore\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can views any models.
     *
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $user
     * @return mixed
     */
    public function viewAny(UserEntity $user)
    {
        return $user->hasPermissionTo('list users');
    }

    /** impersonate user */
    public function impersonate(UserEntity $user)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can views the model.
     *
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $user
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $model
     * @return mixed
     */
    public function view(UserEntity $user, UserEntity $model)
    {
        return $user->hasPermissionTo('views users');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $user
     * @return mixed
     */
    public function create(UserEntity $user)
    {
        return $user->hasPermissionTo('create users');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $user
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $model
     * @return mixed
     */
    public function update(UserEntity $user, UserEntity $model)
    {
        return $user->hasPermissionTo('update users');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $user
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $model
     * @return mixed
     */
    public function delete(UserEntity $user, UserEntity $model)
    {
        return $user->hasPermissionTo('delete users');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $user
     * @return mixed
     */
    public function deleteAny(UserEntity $user)
    {
        return $user->hasPermissionTo('delete users');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $user
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $model
     * @return mixed
     */
    public function restore(UserEntity $user, UserEntity $model)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $user
     * @param \Modules\BaseCore\Contracts\Entities\UserEntity $model
     * @return mixed
     */
    public function forceDelete(UserEntity $user, UserEntity $model)
    {
        return false;
    }
}
