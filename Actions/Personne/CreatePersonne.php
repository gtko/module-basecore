<?php

namespace Modules\BaseCore\Actions\Personne;

use Modules\BaseCore\Actions\Dates\DateStringToCarbon;
use Modules\BaseCore\Contracts\Personnes\CreatePersonneContract;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Http\Requests\PersonneStoreRequest;
use Modules\BaseCore\Models\Personne;

class CreatePersonne implements CreatePersonneContract
{

    public function create(PersonneStoreRequest $request): Personne
    {
        $repPersonne = app(PersonneRepositoryContract::class);

        if(!empty($request->date_birth)) {
            $date_birth = (new DateStringToCarbon())->handle($request->date_birth);
        }

        return $repPersonne->createPersonne(
            $request->firstname,
            $request->phone,
            $request->email,
            $request->address,
            $request->city,
            $request->code_zip,
            $request->country_id,
            $request->lastname,
            $date_birth ?? null,
            $request->gender,
        );
    }
}
