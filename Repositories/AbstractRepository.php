<?php

namespace Modules\BaseCore\Repositories;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\BaseCore\Contracts\Repositories\CreateOrUpdateRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\RelationsRepositoryContract;
use Modules\BaseCore\Exceptions\BadRelationException;
use Modules\BaseCore\Interfaces\RepositoryFetchable;
use Modules\BaseCore\Interfaces\RepositoryQueryCustom;
use Modules\SearchCRM\Interfaces\SearchableRepository;

abstract class AbstractRepository implements SearchableRepository, RepositoryFetchable, RepositoryQueryCustom, RelationsRepositoryContract, CreateOrUpdateRepositoryContract
{
    protected ?Builder $query = null;


    public function createOrUpdate($modelTested, ...$params){
        if($modelTested) {
            $model = $this->update($modelTested, ...$params);
        }else{
            $model = $this->create( ...$params);
        }

        return $model;
    }

    public function all(): Collection
    {
        return $this->newQuery()->get();
    }

    public function fetchAll(int $limit = 50): LengthAwarePaginator
    {
        return $this->newQuery()->paginate($limit);
    }

    public function fetchSearch(string $value, int $limit = 50): LengthAwarePaginator
    {
        $query = $this->newQuery();
        foreach (explode(' ', $value) as $index => $lem) {
            $querySearch = $this->searchQuery($this->getModel()::query(), $lem);
            $query->where(function (Builder $query) use ($querySearch) {
                $query->setQuery($querySearch->getQuery());
            });
        }

        return $query->paginate($limit);
    }

    public function fetchBetweenDate(string $col, array $between, int $limit = 50): LengthAwarePaginator
    {
        return $this->newQuery()->whereBetween($col, $between)->paginate($limit);
    }


    public function fetchById(int $id): ?Model
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

    public function makeRelation(Relation $relation, Model $target, array $pivotData = []): Model|null
    {

        if ($relation->getRelated()::class === $target::class) {
            if (method_exists($relation, 'associate')) {
                $relation->associate($target);
                $relation->getParent()->save();

                return $target;
            }

            $relation->detach($target);

            return $relation->attach($target, $pivotData);
        }

        throw new BadRelationException();
    }

    public function deleteRelation(Relation $relation, Model $target): Model|null|int
    {
        if ($relation->getRelated()::class === $target::class) {
            if (method_exists($relation, 'dissociate')) {
                return $relation->dissociate($target);
            }

            return $relation->detach($target);

        }

        throw new BadRelationException();

    }

    protected function searchDates(Builder $query, string $value, string $field = 'created_at'): Builder
    {
        try {
            $date = Carbon::createFromFormat('d/m/Y', $value);
            $query->orWhereDate($field, $date->startOfDay());
        } catch (\Exception $e) {
            try {
                $date = Carbon::createFromFormat('m/Y', $value);
                $query->orWhereBetween($field, [$date->startOfMonth()->startOfDay(), $date->copy()->endOfMonth()->endOfDay()]);
            } catch (\Exception $e) {

            }
        }

        return $query;
    }
}
