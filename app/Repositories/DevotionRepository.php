<?php

namespace App\Repositories;

use App\Exceptions\DatabaseOperationException;
use Illuminate\Container\Attributes\Singleton;
use App\Models\Devotion;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

#[Singleton()]
class DevotionRepository
{
    public function all(string|null $search, array|null $filter, string|null $orderBy, int $limit, int|null $except): LengthAwarePaginator
    {
        try {
            $query = [
                'where' => [],
                'orderBy' => match ($orderBy) {
                    'Newest' => ['devotions.created_at', 'desc'],
                    'Oldest' => ['devotions.created_at', 'asc'],
                    'Most Popular' => ['devotions.created_at', 'desc'],
                    default => ['devotions.created_at', 'desc']
                }
            ];

            if (isset($search)) {
                $query['where'][] = ['devotions.title', 'ilike', "%{$search}%"];
            }

            if (isset($filter)) {
                collect($filter)->each(function (string $item, string $key) use (&$query): void {
                    $query['where'][] = match ($key) {
                        'filterCategory' => ['c.name', '=', $item]
                    };
                });
            }

            if (isset($except)) {
                $query['where'][] = ['devotions.id', '!=', $except];
            }

            $data = Devotion::select('devotions.id as id', 'devotions.title as title', 'devotions.bible_verse as bible_verse', 'devotions.source as source', 'devotions.body as body', 'c.name as category_name', 'u.name as author_name', 'devotions.created_at as created_at')->join('categories as c', 'c.id', '=', 'devotions.category_id')->join('users as u', 'u.id', '=', 'devotions.user_id')->where($query['where'])->orderBy(...$query['orderBy'])->orderBy('devotions.id', 'desc')->paginate($limit);

            return $data;
        } catch (Throwable $e) {
            throw new DatabaseOperationException(message: $e->getMessage(), previous: $e);
        }
    }

    public function find(int $id): Devotion
    {
        try {
            $data = Devotion::select('devotions.id as id', 'devotions.title as title', 'devotions.bible_verse as bible_verse', 'devotions.source as source', 'devotions.body as body', 'c.name as category_name', 'u.name as author_name', 'devotions.created_at as created_at')->join('categories as c', 'c.id', '=', 'devotions.category_id')->join('users as u', 'u.id', '=', 'devotions.user_id')->find($id);

            return $data;
        } catch (Throwable $e) {
            throw new DatabaseOperationException(message: $e->getMessage(), previous: $e);
        }
    }
}