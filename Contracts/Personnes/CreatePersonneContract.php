<?php


namespace Modules\BaseCore\Contracts\Personnes;


use Modules\BaseCore\Http\Requests\PersonneStoreRequest;
use Modules\BaseCore\Models\Personne;

interface CreatePersonneContract
{

    public function create(PersonneStoreRequest $request):Personne;

}
