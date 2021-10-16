<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfile;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'phone' => ['min:9', 'regex:/^[0-9]+$/', 'unique:users']
        ], [
            'username.unique' => 'Podana nazwa użytkownika jest już zajęta.',
            'username.required' => "Pole nazwa użytkwnika jest wymagane."  ,
            'email.required' => "Pole e-mail jest wymagane."  ,
            'email.unique' => "Podany email jest już zajęty.",
            'email.email' => "Błędny format adresu e-mail.",
            'password.string' => "Hasło musi być ciągiem znaków.",
            'password.min' => "Hasło musi zawierać minimum 5 znaków.",
            'password.confirmed' => "Hasła muszą być jednakowe.",
            'phone.min' => "Numer telefonu musi posiadać minimum 9 znaków.",
            'phone.unique' => "Podany numer telefonu jest już zajęty.",
            'phone.regex' => "Numer telefonu musi składać się z cyfr.",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone']
        ]);
    }



}
