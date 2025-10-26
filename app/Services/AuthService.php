<?php

namespace App\Services;

use App\Exceptions\InvalidCredentialsException;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Container\Attributes\Singleton;
use Illuminate\Support\Facades\Auth;

#[Singleton()]
class AuthService
{
    public function login(LoginUserRequest $request): void
    {
        $validated = $request->validated();

        if (!Auth::attempt(["email" => $validated["email"], "password" => $validated["password"]], $validated["remember"])) {
            throw new InvalidCredentialsException();
        }

        $request->session()->regenerate();
    }
}