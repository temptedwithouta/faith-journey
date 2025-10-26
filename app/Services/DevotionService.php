<?php

namespace App\Services;

use App\Http\Requests\IndexDevotionRequest;
use App\Http\Requests\ShowDevotionRequest;
use App\Models\Devotion;
use App\Repositories\DevotionRepository;
use Illuminate\Container\Attributes\Singleton;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

#[Singleton()]
class DevotionService
{
    public function __construct(private DevotionRepository $devotionRepository)
    {
    }

    public function getAll(IndexDevotionRequest|null $request, int $limit = 6, int|null $except = null): LengthAwarePaginator
    {

        if (isset($request)) {
            $request->validated();

            $validated = $request->all();

            return $this->devotionRepository->all($validated['search'] ?? null, $validated['filter'] ?? null, $validated['orderBy'] ?? null, $limit, $except);
        }

        return $this->devotionRepository->all(null, null, null, $limit, $except);
    }

    public function getById(int $id): Devotion
    {
        $data = $this->devotionRepository->find($id);

        return $data;
    }
}