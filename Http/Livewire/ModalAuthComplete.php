<?php

namespace Modules\BaseCore\Http\Livewire;

use Livewire\Component;
use Modules\BaseCore\Contracts\Repositories\UserRepositoryContract;
use Modules\BaseCore\Interfaces\TypePersonne;
use Modules\BaseCore\Models\Country;

class ModalAuthComplete extends Component
{

    public $personne = null;
    public $type;

    public function mount(UserRepositoryContract $repUser, int $userId)
    {
        $user = $repUser->fetchById($userId);

        $this->personne = $user->personne;
    }

    public function store()
    {
        dd('salut');
    }

    public function render()
    {
        $countries = Country::orderby('name', 'asc')->get();
        return view('basecore::livewire.modal-auth-complete', compact('countries'));
    }
}
