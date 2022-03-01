<?php


namespace Modules\BaseCore\Contracts\Personnes;


use Illuminate\Http\Request;
use Modules\BaseCore\Http\Requests\PersonneStoreRequest;
use Modules\BaseCore\Models\Personne;

interface CreatePersonneContract
{

    public function create(Request|PersonneStoreRequest $request):Personne;

}
