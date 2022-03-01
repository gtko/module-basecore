<?php


namespace Modules\BaseCore\Contracts\Personnes;


use Illuminate\Http\Request;
use Modules\BaseCore\Http\Requests\PersonneStoreRequest;
use Modules\BaseCore\Models\Personne;
use Modules\CrmAutoCar\Http\Requests\fournisseurUpdateRequest;

interface CreatePersonneContract
{

    public function create(Request|fournisseurUpdateRequest|PersonneStoreRequest $request):Personne;

}
