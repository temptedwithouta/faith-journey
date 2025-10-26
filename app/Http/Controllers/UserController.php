<?php

namespace App\Http\Controllers;

use App\Exceptions\DatabaseOperationException;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Throwable;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        try {
            return response()->view('register');
        } catch (Throwable $e) {
            $this->log('error', $e, __FUNCTION__);

            $request->session()->flash('app_error', 'Internal server error, please try again later.');

            return response()->view('register');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        try {
            $this->userService->store($request);

            return redirect()->route('auth.index');
        } catch (Throwable $e) {
            if ($e instanceof ValidationException) {
                return back()->withErrors($e->errors())->withInput();
            } else if ($e instanceof DatabaseOperationException) {
                $this->log('error', $e, __FUNCTION__);
            } else {
                $this->log('error', $e, __FUNCTION__);
            }

            return back()->with('app_error', 'Internal server error, please try again later.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
