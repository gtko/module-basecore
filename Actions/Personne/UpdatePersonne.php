<?php


namespace Modules\BaseCore\Actions\Personne;


use Modules\BaseCore\Actions\Dates\DateStringToCarbon;
use Modules\BaseCore\Contracts\Personnes\UpdatePersonneContract;
use Modules\BaseCore\Contracts\Repositories\AddressRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Http\Requests\PersonneUpdateRequest;
use Modules\BaseCore\Models\Personne;

class UpdatePersonne implements UpdatePersonneContract
{

    public function update(PersonneUpdateRequest $request, Personne $personne): Personne
    {
        $repPersonne = app(PersonneRepositoryContract::class);
        $repAddress = app(AddressRepositoryContract::class);
        $repEmail = app(EmailRepositoryContract::class);

        if(!empty($request->date_birth)) {
            $date_birth = (new DateStringToCarbon())->handle($request->date_birth);
        }

        if($personne->address) {
            $address = $repAddress->update($personne->address, $request->address, $request->city, $request->code_zip, $request->country_id);
        }else{
            $address = $repAddress->create($request->address, $request->city, $request->code_zip, $request->country_id);
        }

        $email = $repEmail->update($personne->emails->first(), $request->email);

        $personne = $repPersonne->update(
            $personne,
            $request->firstname,
            $request->lastname,
            $date_birth ?? null,
            $request->gender
        );

        $repPersonne->makeRelation($personne->address(), $address);
        $repPersonne->makeRelation($personne->emails(), $email);

        return $personne;
    }
}
