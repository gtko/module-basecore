<?php


namespace Modules\BaseCore\Contracts\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Modules\BaseCore\Contracts\Entities\UserEntity;
use Modules\BaseCore\Interfaces\RepositoryFetchable;
use Modules\BaseCore\Models\Personne;
use Modules\SearchCRM\Interfaces\SearchableRepository;

interface UserRepositoryContract extends SearchableRepository, RepositoryFetchable, RelationsRepositoryContract, CreateOrUpdateRepositoryContract
{
    public function create(Personne $personne, array $roles, string $password, array $data = []):UserEntity;
    public function update(UserEntity $user, array $roles, string $password = null, array $data = []):UserEntity;
    public function fetchByEmail(string $email);

    public function getUserByRoleName(array $roles):Collection;

    public function changeEnabled(UserEntity $user,bool $enabled):UserEntity;

}
