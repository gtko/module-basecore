<?php

namespace Modules\BaseCore\Http\Livewire;

use Livewire\Component;
use Modules\BaseCore\Contracts\Entities\UserEntity;
use Modules\BaseCore\Contracts\Repositories\UserRepositoryContract;

class UserSwitch extends Component
{

    public $user;
    public $enabled = false;

    public function mount(UserEntity $user){
        $this->user = $user;
        $this->enabled = $user->enabled;
    }

    public function change(){
        $userRep = app(UserRepositoryContract::class);
        $this->enabled = !$this->enabled;
        $userRep->changeEnabled($this->user,$this->enabled);
    }

    public function render()
    {
        return view('basecore::livewire.user-switch');
    }
}
