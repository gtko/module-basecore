<?php


namespace Modules\BaseCore\Actions\Personne;


use Illuminate\Support\Facades\DB;
use Modules\BaseCore\Actions\Dates\DateStringToCarbon;
use Modules\BaseCore\Contracts\Personnes\UpdatePersonneContract;
use Modules\BaseCore\Contracts\Repositories\AddressRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PhoneRepositoryContract;
use Modules\BaseCore\Http\Requests\PersonneUpdateRequest;
use Modules\BaseCore\Models\Personne;

class UpdatePersonne implements UpdatePersonneContract
{

    public function update(PersonneUpdateRequest $request, Personne $personne): Personne
    {

        DB::beginTransaction();

        $repPersonne = app(PersonneRepositoryContract::class);
        $repAddress = app(AddressRepositoryContract::class);
        $repEmail = app(EmailRepositoryContract::class);
        $repPhone = app(PhoneRepositoryContract::class);

        if(!empty($request->date_birth)) {
            $date_birth = (new DateStringToCarbon())->handle($request->date_birth);
        }

        $address = $repAddress->createOrUpdate($personne->address, $request->address, $request->city, $request->code_zip, $request->country_id);
        $email = $repEmail->createOrUpdate($personne->emails->first(),$request->email);
        $phone = $repPhone->createOrUpdate($personne->phones->first(),$request->phone);

        $personne = $repPersonne->update(
            $personne,
            $request->firstname,
            $request->lastname,
            $date_birth ?? null,
            $request->gender
        );

        $repPersonne->makeRelation($personne->address(), $address);
        $repPersonne->makeRelation($personne->emails(), $email);
        $repPersonne->makeRelation($personne->phones(), $phone);

        DB::commit();

        return $personne;
    }
}
