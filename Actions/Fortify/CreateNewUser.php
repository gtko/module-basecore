<?php

namespace Modules\BaseCore\Actions\Fortify;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Modules\BaseCore\Actions\Personne\CreatePersonne;
use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\UserRepositoryContract;
use Modules\BaseCore\Http\Requests\PersonneStoreRequest;
use Modules\BaseCore\Http\Requests\UserStoreRequest;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \Modules\BaseCore\Models\User
     */
    public function create(array $input)
    {
        $validation_rules = [
            'firstname' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:emails'],
            'password' => $this->passwordRules(),
        ];

        $messages = [
            'firstname.required' => 'Le nom est obligatoire.',
            'firstname.min' => 'Le nom doit faire au moins deux caractères.',
            'firstname.max' => 'Le nom doit faire moins de 255 caractères.',
            'password.confirmed' => 'Les deux mots de pass doivent être identique',
        ];

        Validator::make($input, $validation_rules, $messages)->validate();

        DB::beginTransaction();

        $userRep = app(UserRepositoryContract::class);
        $requestUser = (new UserStoreRequest())->replace($input);
        $requestPersonne = (new PersonneStoreRequest())->replace($input);
        $personneRep = app(PersonneRepositoryContract::class);
        $emailRep = app(EmailRepositoryContract::class);
        $personne = $personneRep->createForRegister($requestPersonne->firstname);
        $email = $emailRep->create($requestPersonne->email);
        $personneRep->makeRelation($personne->emails(), $email);
        $user = $userRep->create($personne, ['user'], $requestUser->password, $requestUser->password_smtp);

        DB::commit();

        return $user;

    }
}
