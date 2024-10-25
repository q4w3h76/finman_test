<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterService
{
    public function register(array $data): User {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return $user;
    }
}