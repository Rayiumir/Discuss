<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Query\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class UnSolvedQueryFilter implements Filter
{
    public function __invoke(Builder|\Illuminate\Database\Eloquent\Builder $query, $value, string $property): void
    {
        $query->whereNull('solution_post_id');
    }
}
