<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfile;
use App\Repository\UserRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    private UserRepository $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function profile(): View
    {
        if (Auth::check()) {
            return view('user.profile', [
                'user' => $this->userRepository->get()
            ]);
        }
        return view('auth.login');
    }

    public function edit(): View
    {
        if (Auth::check()) {
            return view('user.edit', [
                'user' => $this->userRepository->get()
            ]);
        }
        return view('auth.login');

    }
    public function update(UpdateUserProfile $request): RedirectResponse
    {

        $this->userRepository->update($request);

        return redirect()
            ->route('get.profile')
            ->with('status', 'Profil zaktualizowano pomyślnie.');
    }


}
