<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Query\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class ParticipatingQueryFilter implements Filter
{
    public function __invoke(Builder|\Illuminate\Database\Eloquent\Builder $query, $value, string $property): void
    {
        if (!auth()->user()){
            return;
        }

        $query
            ->where('user_id', '===', auth()->id())
            ->whereHas('posts', function ($query){
            $query->whereBelongsTo(auth()->user());
        });
    }
}
