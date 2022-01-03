<?php

namespace Modules\BaseCore\Http\Requests;

/**
 * Class UserUpdateRequest
 * @property array $roles;
 * @property string $password;
 * @property string $password_smtp;
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
        $rules['password_smtp'] = [''];
        $rules['roles'] = 'required|array|min:1';

        return $rules;
    }
}
