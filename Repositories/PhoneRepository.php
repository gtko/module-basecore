<?php namespace Modules\BaseCore\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\BaseCore\Contracts\Repositories\PhoneRepositoryContract;
use Modules\BaseCore\Models\Phone;

class PhoneRepository extends AbstractRepository implements PhoneRepositoryContract
{
    public function createPhone(String $number):?Phone
    {
        $phone = new Phone();

        $phone->phone = $number;
        $phone->save();

        return $phone;
    }

    public function newQuery(): Builder
    {
       return Phone::query();
    }

    public function searchQuery(Builder $query, string $value, mixed $parent = null): Builder
    {
       $value = str_replace(' ', '',$value);
       return $query->where('phone', 'LIKE', '%'.$value.'%');
    }

    public function getModel(): Model
    {
        return new Phone();
    }
}
