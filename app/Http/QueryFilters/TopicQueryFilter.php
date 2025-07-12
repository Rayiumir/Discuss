<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Query\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class TopicQueryFilter implements Filter
{
    public function __invoke(Builder|\Illuminate\Database\Eloquent\Builder $query, $value, string $property): void
    {
        $query->whereHas('topic', function ($query) use ($value){
            $query->where('slug', $value);
        });
    }
}
