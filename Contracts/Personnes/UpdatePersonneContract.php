<?php


namespace Modules\BaseCore\Contracts\Personnes;


use Modules\BaseCore\Http\Requests\PersonneUpdateRequest;
use Modules\BaseCore\Models\Personne;

interface UpdatePersonneContract
{

    public function update(PersonneUpdateRequest $request, Personne $personne):Personne;

}
