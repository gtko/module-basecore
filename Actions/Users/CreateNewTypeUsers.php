<?php

namespace Modules\BaseCore\Actions\Users;

use Carbon\Carbon;
use Modules\BaseCore\Contracts\Repositories\UserRepositoryContract;
use Modules\BaseCore\Models\Commercial;
use Modules\BaseCore\Models\Personne;
use Modules\BaseCore\Models\User;

class CreateNewTypeUsers
{

    public function createNewType(Personne $personne, string $role):User
    {
        $password = md5(Carbon::now());
        $user = app(UserRepositoryContract::class)->create($personne, [$role] , $password);

        return $user;
    }

}
