<?php

namespace Modules\BaseCore\View\Components\Nav;

use Illuminate\View\Component;

class MenuItem extends Component
{

    public function __construct(
        public string $name
    ){}

    /**
     * Get the views / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('basecore::components.nav.menu-item');
    }
}
