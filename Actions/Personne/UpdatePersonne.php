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
use Modules\BaseCore\Models\Email;
use Modules\BaseCore\Models\Personne;
use Modules\CrmAutoCar\Http\Requests\fournisseurUpdateRequest;

class UpdatePersonne implements UpdatePersonneContract
{

    public function update(fournisseurUpdateRequest|PersonneUpdateRequest $request, Personne $personne): Personne
    {
        DB::beginTransaction();

        $repPersonne = app(PersonneRepositoryContract::class);
        $repAddress = app(AddressRepositoryContract::class);
        $repEmail = app(EmailRepositoryContract::class);
        $repPhone = app(PhoneRepositoryContract::class);

        if (!empty($request->date_birth)) {
            $date_birth = (new DateStringToCarbon())->handle($request->date_birth);
        }


        $personne = $repPersonne->update(
            $personne,
            $request->firstname,
            $request->lastname,
            $date_birth ?? null,
            $request->gender
        );

        if ($request->address ?? false) {
            $address = $repAddress->createOrUpdate($personne->address, $request->address, $request->city, $request->code_zip, $request->country_id);
            $repPersonne->makeRelation($personne->address(), $address);
        }

        (new PersonneAddEmail())->add($request->email, $personne);
        (new PersonneAddPhone())->add($request->phone, $personne);

        DB::commit();

        return $personne;
    }
}
