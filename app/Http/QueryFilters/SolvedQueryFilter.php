<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Query\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class SolvedQueryFilter implements Filter
{
    public function __invoke(Builder|\Illuminate\Database\Eloquent\Builder $query, $value, string $property): void
    {
        $query->whereNotNull('solution_post_id');
    }
}
