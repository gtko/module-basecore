<?php


namespace Modules\BaseCore\Contracts\Personnes;


use Illuminate\Http\Request;
use Modules\BaseCore\Http\Requests\PersonneUpdateRequest;
use Modules\BaseCore\Models\Personne;
use Modules\CrmAutoCar\Http\Requests\fournisseurUpdateRequest;

interface UpdatePersonneContract
{

    public function update(Request|fournisseurUpdateRequest|PersonneUpdateRequest $request, Personne $personne):Personne;

}
