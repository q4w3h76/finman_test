<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthService
{
    public function login($data): User|null {
        if (Auth::attempt($data)) {
            return Auth::user();
        }
        return null;
    }

    public function logout(User $user): void {
        Auth::logout($user);
    }
}