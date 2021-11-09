<?php namespace Modules\BaseCore\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PhoneRepositoryContract;
use Modules\BaseCore\Models\Personne;


class PersonneRepository extends AbstractRepository implements PersonneRepositoryContract
{

    public function newQuery():Builder
    {
        return Personne::query();
    }

    public function searchQuery(Builder $query,string $value, mixed $parent = null):Builder
    {

        $query->where(function($query) use ($value){
                $query->where('firstname', 'LIKE', '%'.$value.'%');
                $query->orWhere('lastname', 'LIKE', '%'.$value.'%');
            })
            ->orWhereHas('phones', function($query) use ($value){
                return app(PhoneRepositoryContract::class)->searchQuery($query, $value);
            })
            ->orWhereHas('emails', function($query) use ($value){
                return app(EmailRepositoryContract::class)->searchQuery($query, $value);
            });

        return $query;
    }

    public function create(string $firstname, string $lastname = null, string $date_birth = null, string $gender = 'male'):?Personne
    {
        $personne = new Personne();
        $personne->firstname = $firstname;
        $personne->lastname = $lastname;

        $personne->date_birth = $date_birth;

        $personne->gender = $gender;
        $personne->save();

        return $personne;
    }

    public function createForRegister(string $firstname, string $gender = 'male'): Personne
    {
        $personne = new Personne();
        $personne->firstname = $firstname;

        $personne->gender = $gender;
        $personne->save();

        return $personne;
    }


    public function update(Personne $personne, String $firstname, String $lastname = null, String $dateBirth = null, String $gender = 'male'):?Personne
    {
        $personne = Personne::find($personne->id);
        $personne->firstname = $firstname;
        $personne->lastname = $lastname;
        $personne->date_birth = $dateBirth;
        $personne->gender = $gender;
        $personne->save();

        return $personne;
    }


    public function getModel(): Model
    {
        return new Personne();
    }


}
