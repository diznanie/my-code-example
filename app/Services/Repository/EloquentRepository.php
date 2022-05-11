<?php

namespace App\Services\Repository;
use App\Interfaces\SearchRepository;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class EloquentRepository implements SearchRepository
{
    public function search(string $query = ''): Collection
    {
        return Article::query()
            ->where('body', 'like', "%{$query}%")
            ->orWhere('title', 'like', "%{$query}%")
            ->get();
    }
}
