<?php

namespace Modules\BaseCore\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\BaseCore\Actions\Dates\DateStringToCarbon;
use Modules\BaseCore\Actions\Personne\CreatePersonne;
use Modules\BaseCore\Contracts\Repositories\AddressRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\CompanyRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\UserRepositoryContract;
use Modules\BaseCore\Interfaces\TypePersonne;
use Modules\BaseCore\Models\Country;
use Modules\BaseCore\Models\Personne;

class FormAuthComplete extends Component
{

    public ?Personne $personne;
    public string $company_name;
    public string $firstname;
    public string $lastname;
    public string $date_birth;
    public string $gender_type;
    public string $address;
    public string $city;
    public string $code_zip;
    public string $country_id;
    public string $phone;
    public string $email;

    public $type = 'particulier';

    public function mount(UserRepositoryContract $repUser, int $userId)
    {
        $user = $repUser->fetchById($userId);

        $this->personne = $user->personne;

        $this->company_name = $user->personne->company ?? '';
        $this->firstname = $user->personne->firstname ?? '';
        $this->lastname = $user->personne->lastname ?? '';
        $this->date_birth = $user->personne->date_birth ?? '';
        $this->gender_type = $user->personne->gender ?? '';
        $this->address = $user->personne->address->address ?? '';
        $this->city = $user->personne->address->city ?? '';
        $this->code_zip = $user->personne->address->code_zip ?? '';
        $this->country_id = $user->personne->address->country_id ?? '150';
        $this->phone = $user->personne->phones->first()->phone ?? '';
        $this->email = $user->personne->emails->first()->email ?? '';
    }


    public function store(PersonneRepositoryContract $repPersonne, CompanyRepositoryContract $repCompany, AddressRepositoryContract $repAddress)
    {
        $date_birth = (new DateStringToCarbon())->handle($this->date_birth);

        DB::beginTransaction();

        if(!$this->personne->address && !$this->personne->city && !$this->personne->code_zip)
        {
            $address = $repAddress->createAddress($this->address, $this->city, $this->code_zip, $this->country_id);
            $this->personne->address()->associate($address);
        }

        $personne =  $repPersonne->updatePersonne($this->personne, $this->firstname,  $this->phone, $this->email, $this->address, $this->city, $this->code_zip, $this->country_id, $this->lastname, $date_birth, $this->gender_type);

        if($this == 'company')
        {
            $repCompany->create($personne, $this->company_name);
        }

        DB::commit();


        return redirect(route(config('basecore.route_default')));
    }

    public function render()
    {
        $countries = Country::orderby('name', 'asc')->get();
        return view('basecore::livewire.form-auth-complete', compact('countries'));
    }
}
