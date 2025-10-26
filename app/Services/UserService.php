<?php

namespace App\Services;

use App\Http\Requests\StoreUserRequest;
use App\Repositories\SubscriberRepository;
use App\Repositories\UserRepository;
use Illuminate\Container\Attributes\Singleton;

#[Singleton()]
class UserService
{
    public function __construct(private UserRepository $userRepository, private SubscriberRepository $subscriberRepository)
    {
    }

    public function store(StoreUserRequest $request): void
    {
        $request->validated();

        $validated = $request->all();

        $userCreateData = $this->userRepository->create($validated);

        if ($validated['subscribe']) {
            $this->subscriberRepository->create($userCreateData['id']);
        }
    }
}