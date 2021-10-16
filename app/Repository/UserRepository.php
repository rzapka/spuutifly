<?php


namespace App\Repository;


use App\Http\Requests\UpdateUserProfile;
use Illuminate\Contracts\Auth\Authenticatable;

interface UserRepository
{
    public function get(): ?Authenticatable;
    public function update(UpdateUserProfile $request);
}
