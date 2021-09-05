<?php

namespace Modules\BaseCore\View\Components\Nav;

use Illuminate\View\Component;

class NavLayout extends Component
{

    public function __construct(
        public string $default
    ){
      $this->default = request()->get('tab', $this->default);
    }

    /**
     * Get the views / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('basecore::components.nav.layout');
    }
}
