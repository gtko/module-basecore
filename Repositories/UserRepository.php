<?php namespace Modules\BaseCore\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\BaseCore\Contracts\Entities\UserEntity;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\RelationsRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\UserRepositoryContract;
use Modules\BaseCore\Helpers\HasInterface;
use Modules\BaseCore\Models\Personne;
use Modules\BaseCore\Models\User;

class UserRepository extends AbstractRepository implements UserRepositoryContract
{

    /**
     * @param Personne $personne
     * @param array $roles
     * @param string $password
     * @return User
     */
    public function create(Personne $personne, array $roles , string $password): UserEntity
    {
        $validated = [];
        $validated['password'] = Hash::make($password);
        $validated['personne_id'] = $personne->id;

        $user = app(UserEntity::class)::create($validated);

        $user->syncRoles($roles);

        return $user;
    }

    public function update(UserEntity $user, array $roles, string $password = null,): UserEntity
    {
        $validated = [];
        if ($password) {
            $validated['password'] = Hash::make($password);
        }

        $user->update($validated);

        $user->syncRoles($roles);

        return $user;
    }

    public function searchQuery(Builder $query,string $value, mixed $parent = null):Builder
    {
        if(!HasInterface::has(PersonneRepositoryContract::class, $parent)) {
            $query->whereHas('personne', function ($query) use ($value) {
                return app(PersonneRepositoryContract::class)->searchQuery($query, $value);
            });
        }
//
//        if(!HasInterface::has(DossierRepositoryContract::class, $parent)) {
//            $query->orWhereHas('dossiers', function ($query) use ($value) {
//                return app(DossierRepositoryContract::class)->searchQuery($query, $value, $this);
//            });
//        }
//
//        if(!HasInterface::has(TaskRepositoryContract::class, $parent)) {
//            $query->orWhereHas('tasks', function ($query) use ($value) {
//                app(TaskRepositoryContract::class)->searchQuery($query, $value, $this);
//            });
//        }


        $query = $this->searchDates($query, $value);

        return $query;
    }

    public function getModel(): Model
    {
        return app(UserEntity::class);
    }

    public function fetchByEmail(string $email): Model|null
    {
        return User::whereHas('personne', function($query) use ($email){
            $query->whereHas('emails', function($query) use ($email){
                $query->where('email', $email);
            });
        })->first();
    }

    public function getUserByRoleName(array $roles): Collection
    {
        return $this->newQuery()->whereHas('roles', function($query) use ($roles){
            $query->whereIn('name', $roles);
        })->get();
    }
}
