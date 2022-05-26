<?php

namespace Modules\BaseCore\View\Components;

use Illuminate\View\Component;
use Modules\BaseCore\Contracts\Entities\UserEntity;

class UserEnabled extends Component
{
    public $user;

    public function mount($user) {
        $this->user = $user; 
    }

    public function render()
    {
        return view('basecore::components.user-enabled');
    }
}
