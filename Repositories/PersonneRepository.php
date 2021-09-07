<?php namespace Modules\BaseCore\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Modules\BaseCore\Contracts\Repositories\AddressRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PhoneRepositoryContract;
use Modules\BaseCore\Models\Email;
use Modules\BaseCore\Models\Personne;
use Modules\BaseCore\Models\Phone;

class PersonneRepository implements PersonneRepositoryContract
{

    public function newQuery():Builder
    {
        return Personne::query();
    }

    public function searchQuery(Builder $query,string $value, mixed $parent = null):Builder
    {

        $query->where(function($query) use ($value){
                $query->where('firstname', 'LIKE', '%'.$value.'%');
                $query->orWhere('lastname', 'LIKE', '%'.$value.'%');
            })
            ->orWhereHas('phones', function($query) use ($value){
                return app(PhoneRepositoryContract::class)->searchQuery($query, $value);
            })
            ->orWhereHas('emails', function($query) use ($value){
                return app(EmailRepositoryContract::class)->searchQuery($query, $value);
            });

        return $query;
    }

    public function createPersonne(string $firstname, string $phoneNumber, String $email, String $address_name, String $city, String $code_zip, int $country_id, string $lastname = null, string $date_birth = null, string $gender = 'male'):?Personne
    {
        $repAddress = app(AddressRepositoryContract::class);
        $address = $repAddress->CreateAddress($address_name, $city, $code_zip, $country_id);

        $personne = new Personne();
        $personne->firstname = $firstname;
        $personne->lastname = $lastname;

        $personne->date_birth = $date_birth;

        $personne->gender = $gender;
        $personne->address()->associate($address);
        $personne->save();

        $repPhone = app(PhoneRepositoryContract::class);
        $phone = $repPhone->CreatePhone($phoneNumber);

        $repMail = app(EmailRepositoryContract::class);
        $emailModel = $repMail->CreateEmail($email);

        $personne->phones()->sync($phone);
        $personne->emails()->sync($emailModel);

        return $personne;
    }

    public function createPersonneForRegister(string $firstname, string $email, string $gender = 'male'): Personne
    {

        $personne = new Personne();
        $personne->firstname = $firstname;

        $personne->gender = $gender;
        $personne->save();

        $repMail = app(EmailRepositoryContract::class);
        $emailModel = $repMail->CreateEmail($email);

        $personne->emails()->sync($emailModel);

        return $personne;
    }


    public function updatePersonne(Personne $personne, String $firstname,string $phoneNumber, String $email, String $address_name, String $city, String $code_zip, int $country_id, String $lastname = null, String $dateBirth = null, String $gender = 'male'):?Personne
    {
        $this->updatePersonneAddress($personne, $address_name,  $city,  $code_zip,  $country_id);

        $personne = Personne::find($personne->id);
        $personne->firstname = $firstname;
        $personne->lastname = $lastname;
        $personne->date_birth = $dateBirth;
        $personne->gender = $gender;
        $personne->save();

        $this->updatePersonnePhone($personne, $phoneNumber);
        $this->updatePersonneEmail($personne, $email);

        return $personne;
    }

    public function updatePersonneAddress(Personne $personne,String $address_name, String $city, String $code_zip, int $country_id): void
    {
        $repAddress = app(AddressRepositoryContract::class);
        $repAddress->UpdateAddress($personne->address_id, $address_name, $city, $code_zip, $country_id);
    }

    public function updatePersonnePhone(Personne $personne, String $phoneNumber): void
    {
        $phone = Phone::where('phone', $phoneNumber)->first();

        if (!$phone)
        {
        $phone = new Phone();
        $phone->phone = $phoneNumber;
        $phone->save();
        }

        $personne->phones()->sync($phone);
    }

    public function updatePersonneEmail(Personne $personne, String $email): void
    {
        $emailModel = Email::where('email', $email)->first();

        if (!$emailModel)
        {
            $emailModel = new Email();
            $emailModel->email = $email;
            $emailModel->save();
        }

        $personne->emails()->sync($emailModel);
    }


}
