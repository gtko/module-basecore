<?php

namespace Modules\BaseCore\View\Components\Role;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Badges extends Component
{

    public function __construct(
        public Collection $roles
    ){}

    /**
     * Get the views / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('basecore::components.role.badges');
    }
}
