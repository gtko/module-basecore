<?php

namespace Modules\BaseCore\Http\Requests;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PhoneRepositoryContract;

/**
 * Class PersonneStoreRequest
 * @property $firstname
 * @property $lastname
 * @property $date_birth
 * @property $gender
 * @property $email
 * @property $address
 * @property $city
 * @property $code_zip
 * @property $country_id
 * @property $phone
 * @package Modules\BaseCore\Http\Requests
 */
class PersonneStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => ['required', 'min:2', 'max:255', 'string'],
            'lastname' => ['nullable', 'max:255', 'string'],
            'date_birth' => ['nullable', 'date'],
            'gender' => ['required', 'in:male,female,other'],
            'email' => ['required'],
            'address' => [],
            'city' => [],
            'code_zip' => [],
            'country_id' => ['exists:countries,id'],
            'phone' => [],
        ];
    }


    public function existsField(string $field, $call){
        $exists = $call();
         if($exists) {
             $this->validate([
                 $field => function ($attribute, $value, $fail) use ($exists, $field) {
                     if ($exists) {
                         $this->getValidatorInstance()->getMessageBag()->add($field, $attribute . " n'est pas unique.");
                         $fail($attribute . " n'est pas unique.");
                     }
                 },
             ]);
         }
    }



    public function existsPhone(int $personne_id = null, $champ_request = 'phone'){
        $this->existsField($champ_request, function() use ($personne_id, $champ_request){
            $phoneRep = app(PhoneRepositoryContract::class);
            $phone = $phoneRep->fetchByPhone($this->{$champ_request} ?? '');
            if($phone) {
                return DB::table('personne_phone')
                    ->where('phone_id', $phone->id)
                    ->where('personne_id', '!=', $personne_id)
                    ->exists();
            }

            return false;
        });
    }

    public function existsEmail(int $personne_id = null, $champ_request = 'email'){
        $this->existsField($champ_request, function() use ($personne_id, $champ_request){
            $emailRep = app(EmailRepositoryContract::class);
            $email = $emailRep->fetchByEmail($this->{$champ_request} ?? '');
            if($email) {
                return DB::table('email_personne')
                    ->where('email_id', $email->id)
                    ->where('personne_id', '!=', $personne_id)
                    ->exists();
            }

            return false;
        });
    }

    public function uniqueFields($colones = []){
       $duplicate = [];
       foreach($colones as $index =>  $col){
           if(!empty($this->{$col})) {
               foreach ($colones as $indexCompare => $colTest) {
                   if ($index !== $indexCompare && !empty($this->{$colTest})) {
                       if ($this->{$col} == $this->{$colTest}) {
                           $duplicate[$colTest] = true;
                       }
                   }
               }
           }
       }

        foreach($colones as $col) {
            $this->validate([
                $col => function ($attribute, $value, $fail) use ($duplicate, $col) {
                    if ($duplicate[$col] ?? false) {
                        $this->getValidatorInstance()->getMessageBag()->add($col, $col." est en double dans la fiche.");
                        $fail($col . " est en double dans la fiche.");
                    }
                },
            ]);
        }
    }


}
