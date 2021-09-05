<?php

namespace Modules\BaseCore\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
}
