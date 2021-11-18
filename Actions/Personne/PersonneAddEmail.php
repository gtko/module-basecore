<?php

namespace Modules\BaseCore\Actions\Personne;

use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PhoneRepositoryContract;
use Modules\BaseCore\Models\Email;
use Modules\BaseCore\Models\Personne;

class PersonneAddEmail
{

    public function add(array $emails, Personne $personne){
        $repPersonne = app(PersonneRepositoryContract::class);
        $repEmail = app(EmailRepositoryContract::class);

        foreach ($emails as $order => $emailStr) {
            $email = $repEmail->createOrUpdate(Email::where('email', $emailStr)->first(), $emailStr);
            $repPersonne->makeRelation($personne->emails(), $email, ['order' => $order]);
            $idsEmail[] = $email->id;
        }

        $personne->emails()->sync($idsEmail);
    }

}
