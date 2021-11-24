<?php

namespace Modules\BaseCore\Actions\Personne;

use Illuminate\Support\Facades\DB;
use Modules\BaseCore\Actions\Dates\DateStringToCarbon;
use Modules\BaseCore\Contracts\Personnes\CreatePersonneContract;
use Modules\BaseCore\Contracts\Repositories\AddressRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PhoneRepositoryContract;
use Modules\BaseCore\Http\Requests\PersonneStoreRequest;
use Modules\BaseCore\Models\Personne;

class CreatePersonne implements CreatePersonneContract
{


    public function create(PersonneStoreRequest $request): Personne
    {
        (new CleanOrphelinMailAndPhone())->clean();

        if (!empty($request->date_birth)) {
            $date_birth = (new DateStringToCarbon())->handle($request->date_birth);
        }

        DB::beginTransaction();

        $repPersonne = app(PersonneRepositoryContract::class);
        $repAddress = app(AddressRepositoryContract::class);
        $repEmail = app(EmailRepositoryContract::class);
        $repPhone = app(PhoneRepositoryContract::class);

        if (!empty($request->date_birth)) {
            $date_birth = (new DateStringToCarbon())->handle($request->date_birth);
        }

        $personne = $repPersonne->create(
            $request->firstname,
            $request->lastname,
            $date_birth ?? null,
            $request->gender ?? 'other',
        );

        if ($request->address ?? false) {
            $address = $repAddress->create($request->address, $request->city, $request->code_zip, $request->country_id);
            $repPersonne->makeRelation($personne->address(), $address);
        }

        (new PersonneAddEmail())->add($request->email, $personne);
        (new PersonneAddPhone())->add($request->phone, $personne);

        DB::commit();
        return $personne;
    }
}
