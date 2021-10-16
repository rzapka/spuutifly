<?php


namespace App\Repository\User;


use App\Http\Requests\UpdateUserProfile;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository implements \App\Repository\UserRepository
{
    public function get(): ?Authenticatable
    {
        return Auth::user();
    }

    public function update(UpdateUserProfile $request)
    {
        $user = Auth::user();
        $data = $request->validated();

        $path = null;
        if(!empty($data['avatar'])) {
            $path = $data['avatar']->store('images/profile-pics', 'public');
        }
        if ($path) {
            Storage::disk('public')->delete($user->avatar);
            $data['avatar'] = $path;
        }

        $user->email = $data['email'] ?? $user->email;
        $user->phone = $data['phone'] ?? $user->phone;
        $user->password = Hash::make($data['password']) ?? $user->password;
        $user->avatar = $data['avatar'] ?? $user->avatar;
        $user->save();
    }
}
