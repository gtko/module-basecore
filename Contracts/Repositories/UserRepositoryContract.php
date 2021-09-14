<?php


namespace Modules\BaseCore\Contracts\Repositories;


use Modules\BaseCore\Contracts\Entities\UserEntity;
use Modules\BaseCore\Interfaces\RepositoryFetchable;
use Modules\BaseCore\Models\Personne;
use Modules\BaseCore\Models\User;
use Modules\SearchCRM\Interfaces\SearchableRepository;

interface UserRepositoryContract extends SearchableRepository, RepositoryFetchable, RelationsRepositoryContract
{
    public function create(Personne $personne, array $roles, string $password):UserEntity;
    public function update(UserEntity $user, array $roles, string $password = null):UserEntity;
    public function fetchByEmail(string $email);

}
