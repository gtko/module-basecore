<?php

namespace Modules\BaseCore\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\BaseCore\Actions\Dates\DateStringToCarbon;
use Modules\BaseCore\Actions\Personne\CreatePersonne;
use Modules\BaseCore\Contracts\Repositories\AddressRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\CompanyRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PhoneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\UserRepositoryContract;
use Modules\BaseCore\Exceptions\BadRelationException;
use Modules\BaseCore\Interfaces\TypePersonne;
use Modules\BaseCore\Models\Country;
use Modules\BaseCore\Models\Email;
use Modules\BaseCore\Models\Personne;
use Modules\BaseCore\Models\Phone;

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

    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'date_birth' => 'required',
        'gender_type' => 'required',
        'address' => 'required',
        'city' => 'required',
        'code_zip' => 'required',
        'country_id' => 'required',
        'phone' => 'required|numeric|unique:phones',
        'email' => 'required',
    ];

    protected $messages = [
        'phone.unique' => 'Le numero de téléphone est deja utilisé',
        'phone.numeric' => 'Le numero doit etre au format 0606060606'
    ];


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

    /**
     * @throws BadRelationException
     */

    public function store(PersonneRepositoryContract $repPersonne, CompanyRepositoryContract $repCompany, AddressRepositoryContract $repAddress, EmailRepositoryContract $repEmail, PhoneRepositoryContract $repPhone)
    {
        $this->validate($this->rules,[], $this->messages);

        $date_birth = (new DateStringToCarbon())->handle($this->date_birth);

        DB::beginTransaction();

        $personne = $repPersonne->update($this->personne, $this->firstname, $this->lastname, $date_birth, $this->gender_type);
        $phone = $repPhone->create($this->phone);
        $email = $repEmail->fetchByEmail($this->email);
        $address = $repAddress->create($this->address, $this->city, $this->code_zip, $this->country_id);

        $repPersonne->makeRelation($personne->address(), $address);
        $repPersonne->makeRelation($personne->emails(), $email);
        $repPersonne->makeRelation($personne->phones(), $phone);

        if ($this == 'company') {
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
