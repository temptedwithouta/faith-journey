<?php
namespace App\Repositories;

use App\Exceptions\DatabaseOperationException;
use App\Models\Category;
use Illuminate\Container\Attributes\Singleton;
use Illuminate\Database\Eloquent\Collection;
use Throwable;

#[Singleton()]
class CategoryRepository
{
    public function all(): Collection
    {
        try {
            $data = Category::select('id', 'name')->orderBy('name', 'asc')->get();

            return $data;
        } catch (Throwable $e) {
            throw new DatabaseOperationException(message: $e->getMessage(), previous: $e);
        }
    }
}