<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|integer'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Это поле обязательно для заполнения',
            'name.string' => 'В данное поле необходимо ввести данные строчного типа',
            'email.required' => 'Это поле обязательно для заполнения',
            'email.string' => 'В данное поле необходимо ввести данные строчного типа',
            'email.email' => 'Email должен соответствовать формату email@some.domain',
            'email.unique' => 'Пользователь с таким email уже существует',
            'password.required' => 'Это поле обязательно для заполнения',
            'password.string' => 'В данное поле необходимо ввести данные строчного типа'
        ];
    }
}
