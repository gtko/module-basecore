<?php

namespace Modules\BaseCore\Repositories;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\BaseCore\Interfaces\RepositoryFetchable;
use Modules\BaseCore\Interfaces\RepositoryQueryCustom;
use Modules\SearchCRM\Interfaces\SearchableRepository;

abstract class AbstractRepository implements SearchableRepository, RepositoryFetchable, RepositoryQueryCustom
{
    protected ?Builder $query = null;

    public function all():Collection
    {
        return $this->newQuery()->get();
    }

    public function fetchAll(int $limit = 50): LengthAwarePaginator
    {
        return $this->newQuery()->paginate();
    }

    public function fetchSearch(string $value, int $limit = 50): LengthAwarePaginator
    {
        $query = $this->newQuery();
        foreach(explode(' ', $value) as $index => $lem) {
           $querySearch = $this->searchQuery($this->newQuery(), $lem);
           $query->where(function(Builder $query) use ($querySearch){
               $query->setQuery($querySearch->getQuery());
           });
        }

        return $query->paginate($limit);
    }

    public function fetchById(int $id): Model
    {
        return $this->newQuery()->find($id);
    }

    public function newQuery(): Builder
    {
        return $this->query ?? $this->getModel()::query();
    }

    abstract public function getModel(): Model;

    public function setQuery(Builder $query): void
    {
        $this->query = $query;
    }

    protected function searchDates(Builder $query, string $value, string $field = 'created_at'):Builder
    {
        try{
            $date = Carbon::createFromFormat('d/m/Y',$value);
            $query->orWhereDate($field,$date->startOfDay());
        }catch(\Exception $e){
            try {
                $date = Carbon::createFromFormat('m/Y', $value);
                $query->orWhereBetween($field, [$date->startOfMonth()->startOfDay(), $date->copy()->endOfMonth()->endOfDay()]);
            } catch(\Exception $e){

            }
        }

        return $query;
    }
}
