<?php

namespace Modules\BaseCore\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface RepositoryFilters
{
    public function filterByParents(Builder $query, array $parents):Builder;
}
