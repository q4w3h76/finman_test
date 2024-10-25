<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Inertia\Inertia;

class AuthController extends Controller
{
    private AuthService $authService;
    
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return Inertia::render('Login', [
            'title' => 'Login'
        ]);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $user = $this->authService->login($data);

        return $user ? 
            redirect()->route('transactions.index'):
            back()->withErrors([
                'credentials' => 'The provided credentials do not match our records.'
            ]);
    }

    public function logout(Request $request)
    {
        $this->authService->logout();

        return redirect()->route('login.index');
    }
}
