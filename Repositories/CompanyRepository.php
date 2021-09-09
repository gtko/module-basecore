<?php

namespace Modules\BaseCore\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\BaseCore\Contracts\Repositories\CompanyRepositoryContract;
use Modules\BaseCore\Models\Personne;

class CompanyRepository extends AbstractRepository implements CompanyRepositoryContract
{

    public function newQuery():Builder
    {
        return Personne::query()->where('type', 'company');
    }

    public function searchQuery(Builder $query, string $value, mixed $parent = null): Builder
    {
        $query->where('type', 'company');
        $query->where('company', $value);

        return $query;
    }

    public function getModel(): Model
    {
        return new Personne();
    }

    public function create(Personne $personne, string $company_name): Personne
    {
        $personne->company = $company_name;
        $personne->type = 'company';
        $personne->save();

        return $personne;
    }

    public function update(Personne $personne, string $company_name): Personne {

        $personne->company = $company_name;
        $personne->save();

        return $personne;
    }
}

