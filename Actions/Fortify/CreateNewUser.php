<?php

namespace Modules\BaseCore\Actions\Fortify;

use Laravel\Fortify\Contracts\CreatesNewUsers;
use Modules\BaseCore\Actions\Personne\CreatePersonne;
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
     * @param  array  $input
     * @return \Modules\BaseCore\Models\User
     */
    public function create(array $input)
    {
        $userRep = app(UserRepositoryContract::class);
        $requestUser = (new UserStoreRequest())->replace($input);
        $requestPersonne = (new PersonneStoreRequest())->replace($input);
        $personneRep = app(PersonneRepositoryContract::class);
        $personne = $personneRep->createPersonneForRegister($requestPersonne->firstname, $requestPersonne->email);
        return $userRep->create($personne, ['user'], $requestUser->password, $requestUser->password_smtp);

//        Validator::make($input, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => $this->passwordRules(),
//            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
//        ])->validate();

//        return User::create([
//            'name' => $input['name'],
//            'email' => $input['email'],
//            'password' => Hash::make($input['password']),
//        ]);
    }
}
