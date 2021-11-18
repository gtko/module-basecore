<?php

namespace Modules\BaseCore\Actions\Personne;

use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PhoneRepositoryContract;
use Modules\BaseCore\Models\Email;
use Modules\BaseCore\Models\Personne;
use Modules\BaseCore\Models\Phone;

class PersonneAddPhone
{

    public function add(array $phones, Personne $personne){
        $repPersonne = app(PersonneRepositoryContract::class);
        $repPhone = app(PhoneRepositoryContract::class);

        foreach ($phones as $phoneStr) {
            $phone = $repPhone->createOrUpdate(Phone::where('phone', $phoneStr)->first(), $phoneStr);
            $repPersonne->makeRelation($personne->phones(), $phone);
            $idsPhone[] = $phone->id;
        }
        $personne->phones()->sync($idsPhone);
    }

}
