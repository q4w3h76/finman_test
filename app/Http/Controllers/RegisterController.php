<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;
use Inertia\Inertia;

class RegisterController extends Controller
{
    private RegisterService $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function index()
    {
        return Inertia::render('Register', [
            'title' => 'Register'
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = $this->registerService->register($data);

        return redirect()->route('auth.login.index');
    }
}
