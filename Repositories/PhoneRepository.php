<?php namespace Modules\BaseCore\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\BaseCore\Actions\FormatPhoneNumber;
use Modules\BaseCore\Contracts\Repositories\PhoneRepositoryContract;
use Modules\BaseCore\Models\Phone;

class PhoneRepository extends AbstractRepository implements PhoneRepositoryContract
{
    public function create(String $number):Phone
    {
        $phone = new Phone();

        $phone->phone = (new FormatPhoneNumber())->format($number);
        $phone->save();

        return $phone;
    }

    public function update(Phone $phone, string $number):Phone
    {
        $phone->phone = (new FormatPhoneNumber())->format($number);
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

       $valueFormat = (new FormatPhoneNumber())->format($value);

       return $query
           ->where('phone', 'LIKE', '%'.$value.'%')
           ->OrWhere('phone', $valueFormat);
    }

    public function getModel(): Model
    {
        return new Phone();
    }

    public function fetchByPhone(string $phone): ?Phone
    {
        return Phone::where('phone', $phone)->first();
    }
}
