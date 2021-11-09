<?php namespace Modules\BaseCore\Repositories;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Models\Email;

class EmailRepository extends AbstractRepository implements EmailRepositoryContract
{
    public function create($email): Email
    {
        $emailModel = new Email();

        $emailModel->email = $email;
        $emailModel->save();

        return $emailModel;
    }

    public function update(Email $emailModel, string $email): Email
    {
        $emailModel->email = $email;
        $emailModel->save();

        return $emailModel;
    }

    public function fetchByEmail(string $email): ?Email
    {
        return Email::where('email', $email)->first();

    }


    public function searchQuery(Builder $query, string $value, mixed $parent = null): Builder
    {
        return $query->where('email', 'LIKE', '%'.$value.'%');
    }

    public function getModel(): Model
    {
        return new Email();
    }


}
