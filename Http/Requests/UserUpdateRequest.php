<?php

namespace Modules\BaseCore\Http\Requests;

/**
 * Class UserUpdateRequest
 * @property array $roles;
 * @property string $password;
 * @property string $password_smtp;
 * @property string $company;
 * @property bool $enabled;
 * @property string $siret;
 * @package Modules\BaseCore\Http\Requests
 */
class UserUpdateRequest extends PersonneUpdateRequest
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
        $rules = Parent::rules();
        $rules['password'] = [''];
        $rules['company'] = '';
        $rules['siret'] = '';
        $rules['enabled'] = '';
        $rules['roles'] = 'required|array|min:1';

        return $rules;
    }
}
