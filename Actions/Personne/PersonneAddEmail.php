<?php

namespace Modules\BaseCore\Actions\Personne;

use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PhoneRepositoryContract;
use Modules\BaseCore\Models\Personne;

class PersonneAddEmail
{

    public function add(array $emails, Personne $personne){
        $repPersonne = app(PersonneRepositoryContract::class);
        $repEmail = app(EmailRepositoryContract::class);

        foreach ($emails as $emailStr) {
            $email = $repEmail->createOrUpdate($personne->emails->where('email', $emailStr)->first(), $emailStr);
            $repPersonne->makeRelation($personne->emails(), $email);
            $idsEmail[] = $email->id;
        }

        $personne->emails()->sync($idsEmail);
    }

}
