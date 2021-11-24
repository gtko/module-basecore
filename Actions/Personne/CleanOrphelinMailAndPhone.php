<?php

namespace Modules\BaseCore\Actions\Personne;



use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Models\Email;
use Modules\BaseCore\Models\Phone;

class CleanOrphelinMailAndPhone
{

    public function clean()
    {

        $emails = Email::doesnthave('personnes')->get();
        $phones = Phone::doesnthave('personnes')->get();

        foreach ($emails as $email) {
            $email->delete();
        }

        foreach ($phones as $phone) {
            $phone->delete();
        }
    }
}
