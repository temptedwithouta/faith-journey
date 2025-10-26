<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Container\Attributes\Singleton;
use Illuminate\Database\Eloquent\Collection;

#[Singleton()]
class CategoryService
{
    public function __construct(private CategoryRepository $categoryRepository)
    {
    }

    public function getAll(): Collection
    {
        return $this->categoryRepository->all();
    }
}