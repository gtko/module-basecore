<?php

namespace Modules\BaseCore\View\Components\Nav;

use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Get the views / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('basecore::components.nav.menu');
    }
}
