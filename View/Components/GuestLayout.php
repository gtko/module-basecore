<?php

namespace Modules\BaseCore\View\Components;

use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Get the views / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('basecore::layout.login');
    }
}
