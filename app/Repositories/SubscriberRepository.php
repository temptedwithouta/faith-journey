<?php

namespace App\Repositories;

use App\Exceptions\DatabaseOperationException;
use App\Models\Subscriber;
use Illuminate\Container\Attributes\Singleton;
use Throwable;

#[Singleton()]
class SubscriberRepository
{
    public function create(int $userId): Subscriber
    {
        try {
            $data = Subscriber::create([
                'is_active' => true,
                'subscribe_at' => now(),
                'user_id' => $userId
            ]);

            return $data;
        } catch (Throwable $e) {
            throw new DatabaseOperationException(message: $e->getMessage(), previous: $e);
        }
    }
}