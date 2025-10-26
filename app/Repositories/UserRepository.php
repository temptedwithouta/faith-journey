<?php

namespace App\Repositories;

use App\Exceptions\DatabaseOperationException;
use App\Models\User;
use Illuminate\Container\Attributes\Singleton;
use Throwable;

#[Singleton()]
class UserRepository
{
    public function create(array $data): User
    {
        try {
            $data = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'password' => $data['password'],
            ]);

            return $data;
        } catch (Throwable $e) {
            throw new DatabaseOperationException(message: $e->getMessage(), previous: $e);
        }
    }
}