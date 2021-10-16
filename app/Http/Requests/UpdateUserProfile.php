<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserProfile extends FormRequest
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
        $userId = Auth::id();
        return [
            'email' => [
                'required',
                //'unique:users',
                Rule::unique('users')->ignore($userId),
                'email'
            ],
            'password' => 'string|min:5|confirmed|nullable',
            'phone' => [
                'min:9',
                Rule::unique('users')->ignore($userId),
                'regex:/^[0-9]+$/'
            ],
            'avatar' => 'nullable|file|image'
        ];
    }

    public function messages()
    {
        return [
          'email.required' => "Pole e-mail jest wymagane."  ,
          'email.unique' => "Podany email jest już zajęty.",
          'email.email' => "Błędny format adresu e-mail.",
          'password.string' => "Hasło musi być ciągiem znaków.",
          'password.min' => "Hasło musi zawierać minimum 5 znaków.",
          'password.confirmed' => "Hasła muszą być jednakowe.",
          'phone.min' => "Numer telefonu musi posiadać minimum 9 znaków.",
          'phone.unique' => "Podany numer telefonu jest już zajęty.",
          'phone.regex' => "Numer telefonu musi składać się z cyfr.",
        ];
    }
}
