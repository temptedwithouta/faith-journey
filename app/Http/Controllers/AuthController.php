<?php

namespace App\Http\Controllers;

use App\Exceptions\DatabaseOperationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use App\Exceptions\InvalidCredentialsException;
use Illuminate\Http\Request;
use Throwable;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function index(Request $request): Response
    {
        try {
            return response()->view('login');
        } catch (Throwable $e) {
            $this->log('error', $e, __FUNCTION__);

            $request->session()->flash('app_error', 'Internal server error, please try again later.');

            return response()->view('login');
        }
    }

    public function login(LoginUserRequest $request): RedirectResponse
    {
        try {
            $this->authService->login($request);

            return redirect()->intended('/');
        } catch (Throwable $e) {
            if ($e instanceof ValidationException || $e instanceof InvalidCredentialsException) {
                return back()->withErrors('Invalid email or password')->withInput();
            } else if ($e instanceof DatabaseOperationException) {
                $this->log('error', $e, __FUNCTION__);
            } else {
                $this->log('error', $e, __FUNCTION__);
            }

            return back()->with('app_error', 'Internal server error, please try again later.');
        }
    }
}